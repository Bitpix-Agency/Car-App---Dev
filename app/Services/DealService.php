<?php

namespace App\Services;

use App\Repositories\Contracts\DealRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class DealService
{
    /**
     * @var DealRepositoryContract
     */
    protected $dealRepository;

    /**
     * DealService constructor.
     * @param DealRepositoryContract $dealRepository
     */
    public function __construct(DealRepositoryContract $dealRepository)
    {
        $this->dealRepository = $dealRepository;
    }

    /**
     * @param array $data
     * @param string $url
     * @param $fromUser
     * @return Model
     */
    public function newDeal(array $data, string $url, $fromUser): Model
    {
        return $this->dealRepository->newDeal($data, $url, $fromUser);
    }

}
