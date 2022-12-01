<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface PaymentRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function newPayment(array $data): Model;

}
