<?php

namespace App\Repositories;

use App\Models\Membership;
use App\Repositories\Contracts\MembershipRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class MembershipRepository implements MembershipRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function createMembership(array $data): Model
    {
        $newMembership = new Membership();
        $newMembership->fill($data);
        $newMembership->save();

        return $newMembership;
    }

}
