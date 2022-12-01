<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewFuelRequest;
use App\Models\FuelType;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $allFuel = FuelType::paginate(15);
        return $this->responseHelper->response('true', 'Got Fuel Types', $allFuel, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewFuelRequest $request
     * @return JsonResponse
     */
    public function store(NewFuelRequest $request): JsonResponse
    {
        $newFuel = $this->fuelService->createFuelType($request->all());
        return $this->responseHelper->response('true', 'Added Fuel Type', $newFuel, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param FuelType $fuel
     * @return JsonResponse
     */
    public function show(FuelType $fuel): JsonResponse
    {
        return $this->responseHelper->response('true', 'Got Fuel Type', $fuel, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewFuelRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(NewFuelRequest $request, $id): JsonResponse
    {
        $updateFuel = $this->fuelService->updateFuelType($request->all(), $id);
        return $this->responseHelper->response('true', 'Updated Fuel Type', $updateFuel, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FuelType $fuel
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(FuelType $fuel): JsonResponse
    {
        $fuel->delete();
        return $this->responseHelper->response('true', 'Fuel Type Removed', [], 200);
    }
}
