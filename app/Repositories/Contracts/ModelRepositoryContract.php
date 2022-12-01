<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface ModelRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function createModel(array $data): Model;

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateModel(array $data, int $id): Model;

    /**
     * @param int $id
     * @return Model
     */
    public function findModelById(int $id): Model;

}
