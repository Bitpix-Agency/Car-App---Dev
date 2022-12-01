<?php


namespace App\Helpers;


use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    /**
     * @param bool $success
     * @param string $message
     * @param $data
     * @param int $code
     * @return JsonResponse
     */
    public function response(bool $success, string $message, $data, int $code): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
