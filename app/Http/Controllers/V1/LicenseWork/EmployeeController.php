<?php

namespace App\Http\Controllers\V1\LicenseWork;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LicenseWork\Employees\DestroysEmployeeRequest;
use App\Http\Requests\V1\LicenseWork\Employees\IndexEmployeeRequest;
use App\Http\Requests\V1\LicenseWork\Employees\StoreEmployeeRequest;
use App\Http\Requests\V1\LicenseWork\Employees\UpdateEmployeeRequest;
use App\Http\Resources\V1\LicenseWork\EmployeeCollection;
use App\Http\Resources\V1\LicenseWork\EmployeeResource;
use App\Http\Resources\V1\LicenseWork\ReasonCollection;
use App\Models\Authentication\User;
use App\Models\LicenseWork\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(IndexEmployeeRequest $request)
    {
        $employees = Employee::paginate($request->per_page);

        return (new EmployeeCollection($employees))
            ->additional([
                'msg' => [
                    'summary' => 'success',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreEmployeeRequest $request)
    {
         $employee = new Employee();
         $employee->user()
            ->associate(User::find($request->input('user.id')));
         $employee->save();

        return (new EmployeeResource($employee))
            ->additional([
                'msg' => [
                    'summary' => 'Registro Creado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return (new EmployeeResource($employee))
            ->additional([
                'msg' => [
                    'summary' => 'success',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {

         $employee->user()
            ->associate(User::find($request->input('user.id')));
         $employee->save();

         return (new EmployeeResource($employee))
         ->additional([
             'msg' => [
                 'summary' => 'Registro Actualizado',
                 'detail' => '',
                 'code' => '200'
             ]
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return (new EmployeeResource($employee))
            ->additional([
                'msg' => [
                    'summary' => 'Registro Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ]);
    }

    public function destroys(DestroysEmployeeRequest $request)
    {
        $employees = Employee::whereIn('id', $request->input('ids'))->get();
        Employee::destroy($request->input('ids'));

        return (new EmployeeCollection($employees))
            ->additional([
                'msg' => [
                    'summary' => 'Registros Eliminados',
                    'detail' => '',
                    'code' => '201'
                ]
            ]);
    }

    public function catalogue(IndexEmployeeRequest $request)
    {
        $employees= Employee::get();

        return (new ReasonCollection($employees))
            ->additional([
                'msg' => [
                    'summary' => 'success',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
}


