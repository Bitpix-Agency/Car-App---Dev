<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewDeviceRequest;
use App\Models\Device;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $devices = Device::paginate(15);
        return $this->responseHelper->response('true', 'All Devices', $devices, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(NewDeviceRequest $request): JsonResponse
    {
        $newDevice = $this->deviceService->newDevice($request->all());
        return $this->responseHelper->response('true', 'Device Added', $newDevice, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(Device $device): JsonResponse
    {
        return $this->responseHelper->response('true', 'Got Device', $device, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewDeviceRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(NewDeviceRequest $request, $id): JsonResponse
    {
        $updateDevice = $this->deviceService->updateDevice($request->all(), $id);
        return $this->responseHelper->response('true', 'Updated Device', $updateDevice, 200);
    }

    /**
     * @param Device $device
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Device $device): JsonResponse
    {
        $device->delete();
        return $this->responseHelper->response('true', 'Removed Device', [], 200);
    }
}
