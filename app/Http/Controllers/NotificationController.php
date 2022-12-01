<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewNotificationRequest;
use App\Models\PushNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $allNotifications = PushNotification::paginate(15);
        return $this->responseHelper->response('true', 'All Notifications', $allNotifications, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewNotificationRequest $request
     * @return JsonResponse
     */
    public function store(NewNotificationRequest $request): JsonResponse
    {
        //@todo This will need to send to devices
        $newNotification = $this->notificationService->newNotification($request->all());
        return $this->responseHelper->response('true', 'Sent Notification', $newNotification, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param PushNotification $notification
     * @return JsonResponse
     */
    public function show(PushNotification $notification): JsonResponse
    {
        return $this->responseHelper->response('true', 'Notification', $notification, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        //
    }
}
