<?php

namespace App\Services;

use App\Repositories\Contracts\MakeRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class MakeService
{
    /**
     * @var MakeRepositoryContract
     */
    protected $makeRepository;

    /**
     * MakeService constructor.
     * @param MakeRepositoryContract $makeRepository
     */
    public function __construct(MakeRepositoryContract $makeRepository)
    {
        $this->makeRepository = $makeRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function createMake(array $data): Model
    {
        return $this->makeRepository->createMake($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateMake(array $data, int $id): Model
    {
        return $this->makeRepository->updateMake($data, $id);
    }

}
