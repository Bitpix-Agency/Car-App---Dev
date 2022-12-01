<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewMembershipRequest;
use App\Models\Membership;
use Exception;
use Illuminate\Http\JsonResponse;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->responseHelper->response('true', 'All Memberships', Membership::with('type')->paginate(15), 200);
    }

    /**
     * @param NewMembershipRequest $request
     * @return JsonResponse
     */
    public function store(NewMembershipRequest $request): JsonResponse
    {
        $newMembership = $this->membershipService->createMembership($request->all());
        return $this->responseHelper->response(true, 'Added Membership', $newMembership, 200);
    }

    /**
     * @param Membership $membership
     * @return JsonResponse
     */
    public function show(Membership $membership): JsonResponse
    {
        return $this->responseHelper->response(true, 'Got Membership', $membership, 200);
    }

    /**
     * @param NewMembershipRequest $request
     * @param Membership $membership
     * @return JsonResponse
     */
    public function update(NewMembershipRequest $request, Membership $membership): JsonResponse
    {
        $membership->fill($request->all());
        $membership->save();

        return $this->responseHelper->response(true, 'Updated Membership', $membership, 200);
    }

    /**
     * @param Membership $membership
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Membership $membership): JsonResponse
    {
        $membership->delete();
        return $this->responseHelper->response(true, 'Deleted Membership', [], 200);
    }
}
