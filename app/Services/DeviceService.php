<?php

namespace App\Services;

use App\Repositories\Contracts\DeviceRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class DeviceService
{
    /**
     * @var DeviceRepositoryContract
     */
    protected $deviceRepository;

    /**
     * DeviceService constructor.
     * @param DeviceRepositoryContract $deviceRepository
     */
    public function __construct(DeviceRepositoryContract $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function newDevice(array $data): Model
    {
        return $this->deviceRepository->newDevice($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateDevice(array $data, int $id): Model
    {
        return $this->deviceRepository->updateDevice($data, $id);
    }

}
