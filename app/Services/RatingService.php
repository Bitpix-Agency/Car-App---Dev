<?php

namespace App\Services;

use App\Repositories\Contracts\RatingRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class RatingService
{
    /**
     * @var RatingRepositoryContract
     */
    protected $ratingRepository;

    /**
     * RatingService constructor.
     * @param RatingRepositoryContract $ratingRepository
     */
    public function __construct(RatingRepositoryContract $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function newRating(array $data): Model
    {
        return $this->ratingRepository->newRating($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateRating(array $data, int $id): Model
    {
        return $this->ratingRepository->updateRating($data, $id);
    }

}
