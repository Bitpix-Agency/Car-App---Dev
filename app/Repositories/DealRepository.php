<?php

namespace App\Repositories;

use App\Models\Deal;
use App\Repositories\Contracts\DealRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class DealRepository implements DealRepositoryContract
{
    /**
     * @param array $data
     * @param string $url
     * @param $fromUser
     * @return Model
     */
    public function newDeal(array $data, string $url, $fromUser): Model
    {
        $deal = Deal::updateOrCreate(
            [
                'post_id' => $data['post_id']
            ],
            [
                'to_user_id' => $data['to_user_id'],
                'from_user_id' => $fromUser->id,
                'post_id' => $data['post_id'],
                'pdf_url' => $url,
            ]
        );

        return $deal;
    }

}
