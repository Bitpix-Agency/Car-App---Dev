<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface FeedbackRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function newFeedback(array $data): Model;

    /**
     * @param array $data
     * @param $id
     * @return Model
     */
    public function updateFeedback(array $data, $id): Model;

}
