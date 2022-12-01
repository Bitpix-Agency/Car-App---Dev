<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewRatingRequest;
use App\Models\Rating;
use App\Models\UserRating;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $allRatings = UserRating::with('toUser', 'fromUser')->paginate(15);
        return $this->responseHelper->response('true', 'All Ratings', $allRatings, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewRatingRequest $request
     * @return JsonResponse
     */
    public function store(NewRatingRequest $request): JsonResponse
    {
        $newRating = $this->ratingService->newRating($request->all());
        return $this->responseHelper->response('true', 'Added Rating', $newRating, 200);
    }

    /**
     * @param UserRating $rating
     * @return JsonResponse
     */
    public function show(UserRating $rating): JsonResponse
    {
        return $this->responseHelper->response('true', 'Got Rating', $rating, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewRatingRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(NewRatingRequest $request, int $id): JsonResponse
    {
        $updateRating = $this->ratingService->updateRating($request->all(), $id);
        return $this->responseHelper->response('true', 'Updated Rating', $updateRating, 200);
    }

    /**
     * @param UserRating $rating
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(UserRating $rating): JsonResponse
    {
        $rating->delete();
        return $this->responseHelper->response('true', 'Rating Deleted', [], 200);
    }
}
