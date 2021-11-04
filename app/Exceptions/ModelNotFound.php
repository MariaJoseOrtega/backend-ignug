<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ModelNotFound extends Exception
{
    public static function render()
    {
        return response()->json([
            'data' => null,
            'msg' => [
                'summary' => 'No se encontró el registro',
                'detail' => '',
                'code' => '404',
            ]
        ], 404);
    }
}
