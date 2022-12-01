<?php

namespace App\Repositories;

use App\Models\Feedback;
use App\Repositories\Contracts\FeedbackRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class FeedbackRepository implements FeedbackRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function newFeedback(array $data): Model
    {
        $feedback = new Feedback();
        $feedback->user_id = auth()->user()->id;
        $feedback->feedback = $data['feedback'];
        $feedback->save();

        return $feedback;
    }

    /**
     * @param array $data
     * @param $id
     * @return Model
     */
    public function updateFeedback(array $data, $id): Model
    {
        $updateFeedback = Feedback::find($id);
        $updateFeedback->user_id = auth()->user()->id;
        $updateFeedback->feedback = $data['feedback'];
        $updateFeedback->save();

        return $updateFeedback;
    }

}
