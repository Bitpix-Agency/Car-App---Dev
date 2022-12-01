<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewModelRequest;
use App\Models\Model;
use App\Models\Models;
use Illuminate\Http\JsonResponse;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $models = Models::with('make')->get();
        return $this->responseHelper->response('true', 'Got models', $models, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewModelRequest $request
     * @return JsonResponse
     */
    public function store(NewModelRequest $request): JsonResponse
    {
        $newModel = $this->modelService->createModel($request->all());
        return $this->responseHelper->response('true', 'Created model', $newModel, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Models $model
     * @return JsonResponse
     */
    public function show(Models $model): JsonResponse
    {
        $model = Models::with('make')->findOrFail($model->id);
        return $this->responseHelper->response('true', 'Got model', $model, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewModelRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(NewModelRequest $request, $id): JsonResponse
    {
        $updateModel = $this->modelService->updateModel($request->all(), $id);
        return $this->responseHelper->response('true', 'Updated Model', $updateModel, 200);
    }

    /**
     * @param Models $model
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Models $model): JsonResponse
    {
        $model->delete();
        return $this->responseHelper->response('true', 'Deleted Model', [], 200);
    }
}
