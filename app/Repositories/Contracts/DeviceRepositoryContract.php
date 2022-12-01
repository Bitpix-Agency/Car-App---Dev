<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface DeviceRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function newDevice(array $data): Model;

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateDevice(array $data, int $id): Model;

}
