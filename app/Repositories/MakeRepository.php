<?php

namespace App\Repositories;

use App\Models\Make;
use App\Repositories\Contracts\MakeRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class MakeRepository implements MakeRepositoryContract
{
    /**
     * @param int $id
     * @return Model
     */
    public function findMakeById(int $id): Model
    {
        return Make::findOrFail($id);
    }

    public function createMake(array $data): Model
    {
        $newMake = new Make();
        $newMake->fill($data);
        $newMake->save();

        return $newMake;
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateMake(array $data, int $id): Model
    {
        $make = $this->findMakeById($id);
        $make->name = $data['name'];
        $make->save();

        return $make;
    }

}
