<?php

namespace App\Services;

use App\Repositories\Contracts\ModelRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class ModelService
{
    /**
     * @var ModelRepositoryContract
     */
    protected $modelRepository;

    /**
     * ModelService constructor.
     * @param ModelRepositoryContract $modelRepository
     */
    public function __construct(ModelRepositoryContract $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function createModel(array $data): Model
    {
        return $this->modelRepository->createModel($data);

    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function updateModel(array $data, int $id): Model
    {
        return $this->modelRepository->updateModel($data, $id);
    }

}
