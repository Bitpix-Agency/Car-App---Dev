<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface MembershipRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function createMembership(array $data): Model;
}
