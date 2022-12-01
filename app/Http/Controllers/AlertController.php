<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlertStoreRequest;
use App\Models\Alert;
use Illuminate\Http\JsonResponse;

class AlertController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->responseHelper->response(true, "alerts", Alert::where('user_id', auth()->user()->id)->with('make', 'models')->paginate(15), 200);
    }

    /**
     * @param AlertStoreRequest $request
     * @return JsonResponse
     */
    public function store(AlertStoreRequest $request): JsonResponse
    {
        $newAlert = Alert::create([
            'user_id' => auth()->user()->id,
            'make_id' => $request->make_id,
            'model_id' => $request->model_id,
            'body_type' => $request->body_type,
            'min_price' => $request->min_price,
            'mileage' => $request->mileage,
            'year' => $request->year,
            'reg_no' => $request->reg_no,
            'fuel_type_id' => $request->fuel_type_id,
            'features' => $request->features,
        ]);
        $newAlert->save();

        return $this->responseHelper->response(true, "saved alert", $newAlert, 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return $this->responseHelper->response(true, "alerts", Alert::where('user_id', auth()->user()->id)->where('id', $id)->with('make', 'models')->firstOrFail(), 200);
    }

    /**
     * @param AlertStoreRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(AlertStoreRequest $request, int $id): JsonResponse
    {
        $updateAlert = Alert::updateOrCreate([
            'id' => $id,
            'user_id' => auth()->user()->id,
        ], [
            'user_id' => auth()->user()->id,
            'make_id' => $request->make_id,
            'model_id' => $request->model_id,
            'body_type' => $request->body_type,
            'min_price' => $request->min_price,
            'mileage' => $request->mileage,
            'year' => $request->year,
            'reg_no' => $request->reg_no,
            'fuel_type_id' => $request->fuel_type_id,
            'features' => $request->features,
        ]);
        $updateAlert->save();

        return $this->responseHelper->response(true, "updated alert", $updateAlert, 200);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $alert = Alert::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($alert) {
            $alert->delete();
            return $this->responseHelper->response(true, "alert deleted", [], 200);
        }
        return $this->responseHelper->response(false, "alert cant be deleted", [], 404);
    }
}
