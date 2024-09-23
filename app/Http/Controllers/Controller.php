<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function api($data = null, $message, $code = 200)
    {
        return response()->json([
            'meta' => [
                'code' => $code,
                'message' => $message,
            ],
            'data' => $data,
        ], $code);
    }
}
