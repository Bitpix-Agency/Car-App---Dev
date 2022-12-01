<?php

namespace App\Repositories;

use App\Models\Rating;
use App\Models\UserRating;
use App\Repositories\Contracts\RatingRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class RatingRepository implements RatingRepositoryContract
{
    public function newRating(array $data): Model
    {
        $newRating = new UserRating();
        $newRating->fill($data);
        $newRating->save();

        return $newRating;
    }

    public function updateRating(array $data, int $id): Model
    {
        $updateRating = UserRating::findOrFail($id)->first();
        $updateRating->fill($data);
        $updateRating->save();

        return $updateRating;
    }

}
