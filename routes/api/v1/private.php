<?php

use App\Http\Controllers\V1\LicenseWork\EmployerController;
use App\Http\Controllers\V1\LicenseWork\FormController;
use App\Http\Controllers\V1\LicenseWork\HolidayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\LicenseWork\ApplicationController;
use App\Http\Controllers\V1\LicenseWork\StateController;
use App\Http\Controllers\V1\LicenseWork\ReasonController;
use App\Http\Controllers\V1\LicenseWork\EmployeeController;
use App\Http\Controllers\V1\LicenseWork\DependenceController;



/***********************************************************************************************************************
 * Route REASON
 **********************************************************************************************************************/

Route::apiResource('reasons', ReasonController::class);

Route::prefix('reason')->group(function () {
    Route::patch('destroys', [ReasonController::class, 'destroys']);
    Route::get('index-reason', [ReasonController::class, 'indexReason']);
    Route::get('catalogue', [ReasonController::class, 'catalogue']);
});

Route::prefix('reason/{reason}')->group(function () {
    Route::prefix('file')->group(function () {
        Route::get('{file}/download', [ReasonController::class, 'indexFiles']);
        Route::get('{file}', [ReasonController::class, 'showFile']);
        Route::post('', [ReasonController::class, 'uploadFile']);
        Route::put('{file}', [ReasonController::class, 'updateFile']);
        Route::delete('{file}', [ReasonController::class, 'destroyFile']);
        Route::patch('', [ReasonController::class, 'destroyFiles']);
    });
});


/***********************************************************************************************************************
 * ROUTE FORM
 **********************************************************************************************************************/
Route::apiResource('forms', FormController::class);

Route::prefix('form')->group(function () {
    Route::patch('destroys', [FormController::class, 'destroys']);
    Route::patch('active-form', [FormController::class, 'activeForm']);
    Route::patch('inactive-form', [FormController::class, 'inactiveForm']);
    Route::get('catalogue', [FormController::class, 'catalogue']);
});

Route::prefix('form/{form}')->group(function () {
    Route::prefix('file')->group(function () {
        Route::get('{file}/download', [FormController::class, 'downloadFile']);
        Route::get('', [FormController::class, 'indexFiles']);
        Route::get('{file}', [FormController::class, 'showFile']);
        Route::post('', [FormController::class, 'uploadFile']);
        Route::put('{file}', [FormController::class, 'updateFile']);
        Route::delete('{file}', [FormController::class, 'destroyFile']);
        Route::patch('', [FormController::class, 'destroyFiles']);
    });
});
/***********************************************************************************************************************
 * ROUTE HOLIDAY
 **********************************************************************************************************************/
Route::apiResource('holidays', HolidayController::class);

Route::prefix('holiday')->group(function () {
    Route::patch('destroys', [HolidayController::class, 'destroys']);
});

Route::prefix('holiday/{holiday}')->group(function () {
    Route::prefix('file')->group(function () {
        Route::get('{file}/download', [HolidayController::class, 'downloadFile']);
        Route::get('', [HolidayController::class, 'indexFiles']);
        Route::get('{file}', [HolidayController::class, 'showFile']);
        Route::post('', [HolidayController::class, 'uploadFile']);
        Route::put('{file}', [HolidayController::class, 'updateFile']);
        Route::delete('{file}', [HolidayController::class, 'destroyFile']);
        Route::patch('', [HolidayController::class, 'destroyFiles']);
    });
});
/***********************************************************************************************************************
 * ROUTE EMPLOYER
 **********************************************************************************************************************/
Route::apiResource('employers', EmployerController::class);

Route::prefix('employer')->group(function () {
    Route::patch('destroys', [EmployerController::class, 'destroys']);
});

Route::prefix('employer/{employer}')->group(function () {
    Route::prefix('file')->group(function () {
        Route::get('{file}/download', [EmployerController::class, 'downloadFile']);
        Route::get('', [EmployerController::class, 'indexFiles']);
        Route::get('{file}', [EmployerController::class, 'showFile']);
        Route::post('', [EmployerController::class, 'uploadFile']);
        Route::put('{file}', [EmployerController::class, 'updateFile']);
        Route::delete('{file}', [EmployerController::class, 'destroyFile']);
        Route::patch('', [EmployerController::class, 'destroyFiles']);
    });
});
/***********************************************************************************************************************
 * ROUTE EMPLOYEES
 **********************************************************************************************************************/

Route::apiResource('employees', EmployeeController::class);

Route::prefix('employee')->group(function () {
    Route::patch('destroys', [EmployeeController::class, 'destroys']);
    Route::get('catalogue', [EmployeeController::class, 'catalogue']);
});

Route::prefix('employee/{employee}')->group(function () {
    Route::prefix('file')->group(function () {
        Route::get('{file}/download', [EmployeeController::class, 'indexFiles']);
        Route::get('{file}', [EmployeeController::class, 'showFile']);
        Route::post('', [EmployeeController::class, 'uploadFile']);
        Route::put('{file}', [EmployeeController::class, 'updateFile']);
        Route::delete('{file}', [EmployeeController::class, 'destroyFile']);
        Route::patch('', [EmployeeController::class, 'destroyFiles']);
    });

});


/***********************************************************************************************************************
 * Route Application
 **********************************************************************************************************************/

Route::apiResource('applications', ApplicationController::class);


Route::prefix('application')->group(function () {
    Route::patch('destroys', [ApplicationController::class, 'destroys']);
    Route::post('store-application', [ApplicationController::class, 'storeApplication']);
    Route::patch('update-state-application', [ApplicationController::class, 'updateStateApplication']);
});

Route::prefix('application/{application}')->group(function () {
    Route::prefix('file')->group(function () {
        Route::get('{file}/download', [ApplicationController::class, 'downloadFile']);
        Route::get('', [ApplicationController::class, 'indexFiles']);
        Route::get('{file}', [ApplicationController::class, 'showFile']);
        Route::post('', [ApplicationController::class, 'uploadFile']);
        Route::put('{file}', [ApplicationController::class, 'updateFile']);
        Route::delete('{file}', [ApplicationController::class, 'destroyFile']);
        Route::patch('', [ApplicationController::class, 'destroyFiles']);
    });
});

/***********************************************************************************************************************
 * Route State
 **********************************************************************************************************************/

Route::apiResource('states',StateController ::class);


Route::prefix('state')->group(function () {
    Route::patch('destroys', [StateController::class, 'destroys']);
});

Route::prefix('state/{state}')->group(function () {
});

/***********************************************************************************************************************
 *ROUTE DEPENDENCE
 **********************************************************************************************************************/

Route::apiResource('dependences',DependenceController ::class);


Route::prefix('dependence')->group(function () {
    Route::patch('destroys', [DependenceController::class, 'destroys']);
    Route::patch('approved-application', [DependenceController::class, 'approvedApplication']);
    Route::patch('refuse-application', [DependenceController::class, 'refuseApplication']);
    Route::patch('assign-dependence', [DependenceController::class, 'assignDependence']);
});

Route::prefix('dependence/{dependence}')->group(function () {
    Route::prefix('file')->group(function () {
        Route::get('{file}/download', [DependenceController::class, 'downloadFile']);
        Route::get('', [DependenceController::class, 'indexFiles']);
        Route::get('{file}', [DependenceController::class, 'showFile']);
        Route::post('', [DependenceController::class, 'uploadFile']);
        Route::put('{file}', [DependenceController::class, 'updateFile']);
        Route::delete('{file}', [DependenceController::class, 'destroyFile']);
        Route::patch('', [DependenceController::class, 'destroyFiles']);
    });
});
