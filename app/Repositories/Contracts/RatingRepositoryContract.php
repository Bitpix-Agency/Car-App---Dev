<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface RatingRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function newRating(array $data): Model;

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateRating(array $data, int $id): Model;


}
