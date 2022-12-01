<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface MakeRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function createMake(array $data): Model;

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateMake(array $data, int $id): Model;

    /**
     * @param int $id
     * @return Model
     */
    public function findMakeById(int $id): Model;


}
