<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewDealRequest;
use App\Models\Deal;
use App\Models\Post;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DealController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $deals = Deal::with('to_user', 'from_user', 'post')->where('to_user', auth()->user()->id)->paginate(15);
        return $this->responseHelper->response('true', 'Got Deals', $deals, 200);
    }

    /**
     * @param NewDealRequest $request
     * @return JsonResponse
     */
    public function store(NewDealRequest $request): JsonResponse
    {
        $data = [
            'toUser' => User::find($request->to_user_id),
            'fromUser' => auth()->user(),
            'post' => Post::with('make', 'models')->find($request->post_id),
            'date' => Carbon::now()
        ];

        $pdf = PDF::loadView('dealPDF', $data);
        $uploadPDF = Storage::disk('spaces')->put('uploads/deal-pdf/' . $request->to_user_id . '-' . auth()->user()->id . '-' . $request->post_id, $pdf->output(), 'public');
        if ($uploadPDF) {
            $url = Storage::disk('spaces')->url('uploads/deal-pdf/' . $request->to_user_id . '-' . auth()->user()->id . '-' . $request->post_id);
            $deal = $this->dealService->newDeal($request->all(), $url, auth()->user());
            return $this->responseHelper->response('true', 'Deal done', $deal, 200);
        }

        return $this->responseHelper->response('false', 'Error with deal', [], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $deal = Deal::with('to_user', 'from_user', 'post')->where('id', $id)->firstOrFail();
        return $this->responseHelper->response('true', 'Got Deal', $deal, 200);
    }

    /**
     * @param Deal $deal
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Deal $deal): JsonResponse
    {
        $deal->delete();
        return $this->responseHelper->response('true', 'Deal Removed', [], 200);
    }
}
