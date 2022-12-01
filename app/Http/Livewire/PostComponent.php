<?php

namespace App\Http\Livewire;

use App\Mail\MotorReportMail;
use App\Models\Deal;
use App\Models\Post;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\VehicleMotorCheckInformation;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PostComponent extends Component
{
    public $postId, $post, $message = false, $disabled = false, $userProfile;

    public function mount($id)
    {
        $this->postId = $id;
    }

    public function render()
    {
        $this->post = Post::where('id', $this->postId)->with('images', 'fuelType', 'user', 'models', 'make')->first();
        $this->userProfile = UserProfile::where('user_id', $this->post->user->id)->first();
        return view('livewire.post-component', [
            'post' => $this->post,
        ]);
    }

    public function makeDeal($postUserId)
    {
        $data = [
            'toUser' => User::find($postUserId),
            'fromUser' => User::find(auth()->user()->id),
            'post' => Post::with('make', 'models')->find($this->postId),
            'date' => Carbon::now()
        ];

        $pdf = PDF::loadView('dealPDF', $data);
        $uploadPDF = Storage::disk('spaces')->put('uploads/deal-pdf/' . $postUserId . '-' . auth()->user()->id . '-' . $this->postId, $pdf->output(), 'public');
        if ($uploadPDF) {
            $url = Storage::disk('spaces')->url('uploads/deal-pdf/' . $postUserId . '-' . auth()->user()->id . '-' . $this->postId);
            $this->redirect($url);

            Deal::updateOrCreate(
                [
                    'post_id' => $this->postId
                ],
                [
                    'to_user_id' => $postUserId,
                    'from_user_id' => auth()->user()->id,
                    'post_id' => $this->postId,
                    'pdf_url' => $url,
                ]
            );

            $emails = [
                auth()->user()->email,
                User::where('id', $postUserId)->first()->email
            ];
            $file = $pdf->output();

            Mail::send('mail.dealMail', [], function ($message) use ($emails, $file) {
                $message->to($emails)->subject('Deal has been made');
                $message->attachData($file, 'deal.pdf');
            });
        }
    }

    public function motorCheck()
    {
        $this->message = "Generating Report Please Wait";
        $this->disabled = true;
        // @todo this needs to be done when subs is in
        //We need to check if user can do this first

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
            'vrm' => $this->post->regno
        ])->json();

        if (empty($reportSearch['data'])) {
            $reportCreate = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json'
            ])->post(env('MOTOR_CHECK_URL') . '/report/create', [
                'vrm' => $this->post->regno,
                'method' => "tradeCheck",
                'currentMiles' => $this->post->mileage
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

        $this->message = "Report Generated Check Your Email";
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
