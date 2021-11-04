<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Authentication\AuthController;

Route::prefix('login')->group(function () {
    Route::get('{driver}', [AuthController::class, 'redirectToProvider']);
    Route::get('{driver}/callback', [AuthController::class, 'handleProviderCallback']);
});

Route::get('password/{password}',function ($password){
    return \Illuminate\Support\Facades\Hash::make($password);
});

Route::get('test',function (){
    $array = array('a','b','c');
    $indice= array_search('a',$array);

    unset($array[2]);
    return response()->json($array);
});
