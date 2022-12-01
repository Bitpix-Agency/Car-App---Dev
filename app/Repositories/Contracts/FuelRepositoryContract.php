<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface FuelRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function createFuelType(array $data): Model;

    /**
     * @param int $id
     * @return Model
     */
    public function findFuelTypeById(int $id): Model;

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateFuelType(array $data, int $id): Model;

}
