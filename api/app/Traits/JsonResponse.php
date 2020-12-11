<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait JsonResponse
{
    /**
     * success response method.
     *
     * @param $result
     * @param $message
     * @param int $code
     * @param bool $isSuccess
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result, $message, $code = Response::HTTP_OK, $isSuccess = true)
    {
        $response = [
            'success' => $isSuccess,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @param $message
     * @param array $errors
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($message, $errors = [], $code = Response::HTTP_NOT_FOUND)
    {
        return $this->sendResponse($errors, $message, $code, false);
    }
}
