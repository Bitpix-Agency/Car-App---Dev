<?php

namespace App\Repositories;

use App\Models\FuelType;
use App\Repositories\Contracts\FuelRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class FuelRepository implements FuelRepositoryContract
{
    /**
     * @param int $id
     * @return Model
     */
    public function findFuelTypeById(int $id): Model
    {
        return FuelType::findOrFail($id);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function createFuelType(array $data): Model
    {
        $newFuelType = new FuelType();
        $newFuelType->fill($data);
        $newFuelType->save();

        return $newFuelType;
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateFuelType(array $data, int $id): Model
    {
        $updateFuelType = $this->findFuelTypeById($id);
        $updateFuelType->fill($data);
        $updateFuelType->save();

        return $updateFuelType;
    }

}
