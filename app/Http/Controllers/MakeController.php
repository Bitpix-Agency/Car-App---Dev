<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewMakeRequest;
use App\Models\Make;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $makes = Make::with('models')->get();
        return $this->responseHelper->response('true', 'Got makes', $makes, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewMakeRequest $request
     * @return JsonResponse
     */
    public function store(NewMakeRequest $request): JsonResponse
    {
        $newMake = $this->makeService->createMake($request->all());
        return $this->responseHelper->response('true', 'Created make', $newMake, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Make $make
     * @return JsonResponse
     */
    public function show(Make $make): JsonResponse
    {
        return $this->responseHelper->response('true', 'Got make', $make, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewMakeRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(NewMakeRequest $request, $id): JsonResponse
    {
        $updateMake = $this->makeService->updateMake($request->all(), $id);
        return $this->responseHelper->response('true', 'Created make', $updateMake, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Make $make
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Make $make): JsonResponse
    {
        $make->delete();
        return $this->responseHelper->response('true', 'Make deleted', [], 200);
    }
}
