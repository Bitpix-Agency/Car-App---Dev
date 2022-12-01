<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPaymentRequest;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $allPayments = Payment::with('user', 'membership')->paginate(15);
        return $this->responseHelper->response('true', 'All Payments', $allPayments, 200);
    }

    /**
     * @param NewPaymentRequest $request
     * @return JsonResponse
     */
    public function store(NewPaymentRequest $request): JsonResponse
    {
        $newPayment = $this->paymentService->newPayment($request->all());
        return $this->responseHelper->response('true', 'Added Payments', $newPayment, 200);
    }

    /**
     * @param Payment $payment
     * @return JsonResponse
     */
    public function show(Payment $payment): JsonResponse
    {
        $payment = Payment::with('user', 'membership')->where('id', $payment->id)->first();
        return $this->responseHelper->response('true', 'Got Payment', $payment, 200);
    }
}
