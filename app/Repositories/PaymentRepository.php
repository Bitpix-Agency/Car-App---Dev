<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Repositories\Contracts\PaymentRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class PaymentRepository implements PaymentRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function newPayment(array $data): Model
    {
        $newPayment = new Payment();
        $newPayment->fill($data);
        $newPayment->save();

        return $newPayment;
    }

}
