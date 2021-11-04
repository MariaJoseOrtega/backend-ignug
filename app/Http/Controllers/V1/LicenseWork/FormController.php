<?php

namespace App\Http\Controllers\V1\LicenseWork;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LicenseWork\Forms\DestroysFormRequest;
use App\Http\Requests\V1\LicenseWork\Forms\IndexFormRequest;
use App\Http\Requests\V1\LicenseWork\Forms\StoreFormRequest;
use App\Http\Requests\V1\LicenseWork\Forms\UpdateFormRequest;
use App\Http\Resources\V1\LicenseWork\FormCollection;
use App\Http\Resources\V1\LicenseWork\FormResource;
use App\Models\LicenseWork\Employer;
use Illuminate\Http\Request;
use App\Models\LicenseWork\Form;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexFormRequest $request)
    {
        $sorts = explode(',', $request->sort);
        $forms = Form::customOrderBy($sorts)
            ->code($request->input('code'))
            ->regime($request->input('regime'))
            ->paginate($request->per_page);

        return (new FormCollection($forms))
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
    public function store(StoreFormRequest $request)
    {
        $form = new Form();
        $form->employer()
            ->associate(Employer::find($request->input('employer.id')));

        $form->code= $request->input('code');
        $form->description= $request->input('description');
        $form->regime= $request->input('regime');
        $form->days_const= $request->input('daysConst');
        $form->approved_level= $request->input('approvedLevel');
        $form->state= $request->input('state');

        $form->save();

        return (new FormResource($form))
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
    public function show(Form $form)
    {
        return (new FormResource($form))
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
    public function update(UpdateFormRequest $request, Form $form)
    {

        $form->employer()
            ->associate(Employer::find($request->input('employer.id')));
        $form->code= $request->input('code');
        $form->description= $request->input('description');
        $form->regime= $request->input('regime');
        $form->days_const= $request->input('daysConst');
        $form->approved_level= $request->input('approvedLevel');
        $form->state= $request->input('state');

        $form->save();

        return (new FormResource($form))
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
    public function destroy(Form $form)
    {
        $form->delete();
        return (new FormResource($form))
            ->additional([
                'msg' => [
                    'summary' => 'Registro Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ]);
    }
    public function destroys(DestroysFormRequest $request)
    {
        $forms = Form::whereIn('id', $request->input('ids'))->get();
        Form::destroy($request->input('ids'));

        return (new FormCollection($forms))
            ->additional([
                'msg' => [
                    'summary' => 'Registros Eliminados',
                    'detail' => '',
                    'code' => '201'
                ]
            ]);
    }
    // actualizar el estado del formulario si esta activo o inactivo
    public function activeForm(Form $form){
        $form->state = true;
        $form->save();
        return (new FormResource($form))
            ->additional([
                'msg' => [
                    'summary' => 'Formulario activado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
    public function inactiveForm(Form $form){
        $form->state = false;
        $form->save();
        return (new FormResource($form))
            ->additional([
                'msg' => [
                    'summary' => 'Formulario desactivado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    public function catalogue(IndexFormRequest $request)
    {

        $forms = Form::get();

        return (new FormCollection($forms))
            ->additional([
                'msg' => [
                    'summary' => 'success',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

}
