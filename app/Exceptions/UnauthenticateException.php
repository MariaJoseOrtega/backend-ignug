<?php

namespace App\Exceptions;

use Exception;

class UnauthenticateException extends Exception
{
    public static function render()
    {
        return response()->json([
            'data' => null,
            'msg' => [
                'summary' => 'Usuario no autenticado',
                'detail' => 'Por favor inicie sesión',
                'code' => '401',
            ]
        ], 401);
    }
}
