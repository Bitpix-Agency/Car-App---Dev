<?php

namespace App\Repositories;

use App\Models\Device;
use App\Repositories\Contracts\DeviceRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class DeviceRepository implements DeviceRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function newDevice(array $data): Model
    {
        $newDevice = new Device();
        $newDevice->fill($data);
        $newDevice->save();

        return $newDevice;
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateDevice(array $data, int $id): Model
    {
        $device = Device::find($id);
        $device->fill($data);
        $device->save();

        return $device;
    }

}
