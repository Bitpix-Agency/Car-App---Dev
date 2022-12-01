<?php

namespace App\Repositories;

use App\Models\PushNotification;
use App\Repositories\Contracts\NotificationRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class NotificationRepository implements NotificationRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function newNotification(array $data): Model
    {
        $newNotification = new PushNotification();
        $newNotification->content = ($data['content']);
        $newNotification->save();

        return $newNotification;
    }

}
