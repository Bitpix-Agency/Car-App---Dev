<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface DealRepositoryContract
{
    /**
     * @param array $data
     * @param string $url
     * @return Model
     */
    public function newDeal(array $data, string $url, $fromUser): Model;

}
