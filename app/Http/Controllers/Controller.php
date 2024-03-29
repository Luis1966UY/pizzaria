<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function createResponse($data, $code)
    {
        return response()->json(['data' => $data], $code);
    }

    public function createResponseError($message, $code)
    {
        return response()->json(['message' => $message, 'code' => $code], $code);
    }

}
