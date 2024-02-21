<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function sendResponse($data, string $message, int $code = Response::HTTP_OK)
    {
        return response()->json([
            'message' => $message,
            'status' => true,
            'data' => $data,
        ], $code);
    }

    protected function sendError(array $data, string $message, int $code = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => false
        ], $code);
    }
}
