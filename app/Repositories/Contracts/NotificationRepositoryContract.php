<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface NotificationRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function newNotification(array $data): Model;

}
