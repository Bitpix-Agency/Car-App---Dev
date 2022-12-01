<?php

namespace App\Services;

use App\Repositories\Contracts\PaymentRepositoryContract;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PaymentService
{
    /**
     * @var PaymentRepositoryContract
     */
    protected $paymentRepository;

    /**
     * PaymentService constructor.
     * @param PaymentRepositoryContract $paymentRepository
     */
    public function __construct(PaymentRepositoryContract $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function newPayment(array $data): Model
    {
        $data['payment_date'] = Carbon::now();
        return $this->paymentRepository->newPayment($data);
    }

}
