<?php

    use App\Http\Controllers\V1\Authentication\AuthController;
    use App\Http\Controllers\V1\Core\LocationController;
    use Illuminate\Support\Facades\Artisan;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Route;

    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->middleware('verify_user_blocked');
        Route::post('password-forgot', [AuthController::class, 'passwordForgot']);
        Route::post('user-unlock', [AuthController::class, 'userUnlock']);
        Route::post('user-unlock', [AuthController::class, 'userUnlock']);
        Route::post('email-verified', [AuthController::class, 'emailVerified']);
    });

    Route::apiResource('locations', LocationController::class);

    Route::get('init', function () {
        if (env('APP_ENV') != 'local') {
            return response()->json('El sistema se encuentra en producción.', 500);
        }

        DB::select('drop schema if exists public cascade;');
        DB::select('drop schema if exists authentication cascade;');
        DB::select('drop schema if exists core cascade;');
        DB::select('drop schema if exists license_work cascade;');

        DB::select('create schema authentication;');
        DB::select('create schema core;');
        DB::select('create schema license_work;');

        Artisan::call('migrate', ['--seed' => true]);

        return response()->json([
            'msg' => [
                'Los esquemas fueron creados correctamente.',
                'Las migraciones fueron creadas correctamente'
            ]
        ]);
    });
