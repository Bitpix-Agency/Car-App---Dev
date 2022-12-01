<?php

namespace App\Services;

use App\Repositories\Contracts\MembershipRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class MembershipService
{
    /**
     * @var MembershipRepositoryContract
     */
    protected $membershipRepository;

    /**
     * MembershipService constructor.
     * @param MembershipRepositoryContract $membershipRepository
     */
    public function __construct(MembershipRepositoryContract $membershipRepository)
    {
        $this->membershipRepository = $membershipRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function createMembership(array $data): Model
    {
        return $this->membershipRepository->createMembership($data);
    }
}
