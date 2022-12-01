<?php

namespace App\Http\Controllers;

use App\Mail\MotorReportMail;
use App\Models\VehicleMotorCheckInformation;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class MotorCheckController extends Controller
{
    /**
     * @param $regno
     * @param $mileage
     * @return JsonResponse
     */
    public function motorCheck($regno, $mileage): JsonResponse
    {
        $getToken = Http::post(env('MOTOR_CHECK_URL') . '/oauth/token', [
            'grant_type' => env('MOTOR_CHECK_GRANT_TYPE'),
            'client_id' => env('MOTOR_CHECK_CLIENT_ID'),
            'client_secret' => env('MOTOR_CHECK_CLIENT_SECRET'),
            'scope' => env('MOTOR_CHECK_SCOPE'),
        ]);

        $accessToken = $getToken->json()['access_token'];

        $reportSearch = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json'
        ])->post(env('MOTOR_CHECK_URL') . '/report/search', [
            'vrm' => $regno
        ])->json();

        if (empty($reportSearch['data'])) {
            $reportCreate = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json'
            ])->post(env('MOTOR_CHECK_URL') . '/report/create', [
                'vrm' => $regno,
                'method' => "tradeCheck",
                'currentMiles' => $mileage
            ])->json();

            $newReport = $this->createReport($reportCreate['data']);

            $reportSearch['data'][0]['report_id'] = $newReport->report_id;
        }

        $haveReport = VehicleMotorCheckInformation::where('report_id', $reportSearch['data'][0]['report_id'])->first();

        if (!$haveReport) {
            $reportShow = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json'
            ])->post(env('MOTOR_CHECK_URL') . '/report/show', [
                'report_id' => $reportSearch['data'][0]['report_id'],
            ])->json();

            $this->createReport($reportShow['data']);
        }
        Mail::to(auth()->user()->email)
            ->queue(new MotorReportMail($haveReport->url));

        return $this->responseHelper->response(true, 'Report Generated Check Your Email', [], 200);
    }

    /**
     * @param $data
     * @return VehicleMotorCheckInformation
     */
    public function createReport($data): VehicleMotorCheckInformation
    {
        $newReport = new VehicleMotorCheckInformation();
        $newReport->report_id = $data['id'];
        $newReport->vrm = $data['vrm'];
        $newReport->location = $data['location'];
        $newReport->user = $data['user'];
        $newReport->issue_finance = $data['issues']['finance']['flag'];
        $newReport->issue_mileage = $data['issues']['mileage']['flag'];
        $newReport->issue_at_risk = $data['issues']['atRisk']['flag'];
        $newReport->issue_write_off = $data['issues']['writeOff']['flag'];
        $newReport->issue_condition_alerts = $data['issues']['conditionAlerts']['flag'];
        $newReport->issue_scrapped = $data['issues']['scrapped']['flag'];
        $newReport->issue_stolen = $data['issues']['stolen']['flag'];
        $newReport->issue_keepers = $data['issues']['keepers']['flag'];
        $newReport->issue_plate_change = $data['issues']['plateChange']['flag'];
        $newReport->issue_colour_changes = $data['issues']['colourChanges']['flag'];
        $newReport->issue_mot_history = $data['issues']['motHistory']['flag'];
        $newReport->issue_tax_and_sorn = $data['issues']['taxAndSorn']['flag'];
        $newReport->issue_origin_and_use = $data['issues']['originAndUse']['flag'];
        $newReport->url = $data['url'];
        $newReport->pdf = $data['pdf'];
        $newReport->save();

        return $newReport;
    }
}
