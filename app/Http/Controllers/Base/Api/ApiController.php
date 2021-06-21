<?php

namespace App\Http\Controllers\Base\Api;

use App\Http\Controllers\Base\BaseController;

class ApiController extends BaseController
{
    public function sendResponse($message, $data = [])
    {
        $response = [
            'status' => 1,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */

    public function sendError($error, $code = 404)
    {
        $response = [
            'status' => 0,
            'message' => $error,
        ];

        return response()->json($response, $code);
    }
}
