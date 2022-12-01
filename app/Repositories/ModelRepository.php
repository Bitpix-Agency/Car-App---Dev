<?php

namespace App\Repositories;

use App\Models\Models;
use App\Repositories\Contracts\ModelRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class ModelRepository implements ModelRepositoryContract
{
    /**
     * @param int $id
     * @return Model
     */
    public function findModelById(int $id): Model
    {
        return Models::findOrFail($id);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function createModel(array $data): Model
    {
        $newModel = new Models();
        $newModel->fill($data);
        $newModel->save();

        return $newModel;
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateModel(array $data, int $id): Model
    {
        $model = $this->findModelById($id);
        $model->fill($data);
        $model->save();

        return $model;
    }

}
