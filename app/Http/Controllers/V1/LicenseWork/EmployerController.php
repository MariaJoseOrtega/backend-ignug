<?php

namespace App\Http\Controllers\V1\LicenseWork;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LicenseWork\Employers\DestroysEmployerRequest;
use App\Http\Requests\V1\LicenseWork\Employers\IndexEmployerRequest;
use App\Http\Requests\V1\LicenseWork\Employers\StoreEmployerRequest;
use App\Http\Requests\V1\LicenseWork\Employers\UpdateEmployerRequest;
use App\Http\Resources\V1\LicenseWork\EmployerCollection;
use App\Http\Resources\V1\LicenseWork\EmployerResource;
use Illuminate\Http\Request;
use App\Models\LicenseWork\Employer;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexEmployerRequest $request)
    {
        $sorts = explode(',', $request->sort);

        $employers = Employer::customOrderBy($sorts)
            ->logo($request->input('logo'))
            ->department($request->input('department'))
            ->coordination($request->input('coordination'))
            ->unit($request->input('unit'))
            ->paginate($request->per_page);


        return (new EmployerCollection($employers))
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
    public function store(StoreEmployerRequest $request)
    {
        $employer = new Employer();
        $employer->logo = $request->input('logo');
        $employer->department = $request->input('department');
        $employer->coordination= $request->input('coordination');
        $employer->unit = $request->input('unit');
        $employer->approval_name = $request->input('approvalName');
        $employer->register_name= $request->input('registerName');
        $employer->save();

        return (new EmployerResource($employer))
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
    public function show(Employer $employer)
    {
        return (new EmployerResource($employer))
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

    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        $employer->logo = $request->input('logo');
        $employer->department = $request->input('department');
        $employer->coordination= $request->input('coordination');
        $employer->unit = $request->input('unit');
        $employer->approval_name = $request->input('approvalName');
        $employer->register_name= $request->input('registerName');
        $employer->save();

        return (new EmployerResource($employer))
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
    public function destroy(Employer $employer)
    {
        $employer->delete();
        return (new EmployerResource($employer))
            ->additional([
                'msg' => [
                    'summary' => 'Registro Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ]);
    }
    public function destroys(DestroysEmployerRequest $request)
    {
        $employers = Employer::whereIn('id', $request->input('ids'))->get();
        Employer::destroy($request->input('ids'));

        return (new EmployerCollection($employers))
            ->additional([
                'msg' => [
                    'summary' => 'Registros Eliminados',
                    'detail' => '',
                    'code' => '201'
                ]
            ]);
    }
    // devolver listado de empleadores
    public function selectEmployer(IndexEmployerRequest $request){
        $sorts = explode(',', $request->sort);

        $employers = Employer::customOrderBy($sorts)
            ->logo($request->input('logo'))
            ->department($request->input('department'))
            ->coordination($request->input('coordination'))
            ->unit($request->input('unit'));


        return (new EmployerCollection($employers))
            ->additional([
                'msg' => [
                    'summary' => 'success',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
}
