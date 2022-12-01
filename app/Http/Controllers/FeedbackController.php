<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewFeedbackRequest;
use App\Models\Feedback;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $allFeedback = Feedback::with('userId')->paginate(15);
        return $this->responseHelper->response('true', 'All Feedback', $allFeedback, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewFeedbackRequest $request
     * @return JsonResponse
     */
    public function store(NewFeedbackRequest $request): JsonResponse
    {
        $newFeedback = $this->feedbackService->newFeedback($request->all());
        return $this->responseHelper->response('true', 'Feedback Added', $newFeedback, 200);
    }

    /**
     * @param Feedback $feedback
     * @return JsonResponse
     */
    public function show(Feedback $feedback): JsonResponse
    {
        return $this->responseHelper->response('true', 'Got Feedback', $feedback, 200);
    }

    /**
     * @param NewFeedbackRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(NewFeedbackRequest $request, $id): JsonResponse
    {
        $updateFeedback = $this->feedbackService->updateFeedback($request->all(), $id);
        return $this->responseHelper->response('true', 'Feedback Updated', $updateFeedback, 200);
    }

    /**
     * @param Feedback $feedback
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Feedback $feedback): JsonResponse
    {
        $feedback->delete();
        return $this->responseHelper->response('true', 'Feedback Deleted', [], 200);
    }
}
