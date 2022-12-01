<?php

namespace App\Services;

use App\Repositories\Contracts\FuelRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class FuelService
{
    /**
     * @var FuelRepositoryContract
     */
    protected $fuelRepository;

    /**
     * FuelService constructor.
     * @param FuelRepositoryContract $fuelRepository
     */
    public function __construct(FuelRepositoryContract $fuelRepository)
    {
        $this->fuelRepository = $fuelRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function createFuelType(array $data): Model
    {
        return $this->fuelRepository->createFuelType($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateFuelType(array $data, int $id): Model
    {
        return $this->fuelRepository->updateFuelType($data, $id);
    }

}
