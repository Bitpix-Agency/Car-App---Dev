<?php

namespace App\Services;

use App\Repositories\Contracts\FeedbackRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class FeedbackService
{
    /**
     * @var FeedbackRepositoryContract
     */
    protected $feedbackRepository;

    /**
     * FeedbackService constructor.
     * @param FeedbackRepositoryContract $feedbackRepository
     */
    public function __construct(FeedbackRepositoryContract $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function newFeedback(array $data): Model
    {
        return $this->feedbackRepository->newFeedback($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updateFeedback(array $data, int $id): Model
    {
        return $this->feedbackRepository->updateFeedback($data, $id);
    }

}
