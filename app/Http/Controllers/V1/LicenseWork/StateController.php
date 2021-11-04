<?php

namespace App\Http\Controllers\V1\LicenseWork;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LicenseWork\States\DestroysStateRequest;
use App\Http\Requests\V1\LicenseWork\States\IndexStateRequest;
use App\Http\Requests\V1\LicenseWork\States\StoreStateRequest;
use App\Http\Requests\V1\LicenseWork\States\UpdateStateRequest;
use App\Http\Resources\V1\LicenseWork\StateCollection;
use App\Http\Resources\V1\LicenseWork\StateResource;
use App\Models\LicenseWork\State;
use Illuminate\Http\Request;

//hellow :3
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexStateRequest $request)
    {
        $sorts = explode(',', $request->sort);

        $states = State::customOrderBy($sorts)
            ->name($request->input('name'))
            ->code($request->input('code'))
            ->paginate($request->per_page);

        return (new StateCollection($states))
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
    public function store(StoreStateRequest $request)
    {
        $state = new State();

        $state->name = $request->input('name');
        $state->code = $request->input('code');
        $state->save();

        return (new StateResource($state))
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
    public function show(State $state)
    {
        return (new StateResource($state))
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
    public function update(UpdateStateRequest $request, State $state)
    {

        $state->name = $request->input('name');
        $state->code = $request->input('code');
        $state->save();

        return (new StateResource($state))
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
    public function destroy(State $state)
    {
        $state->delete();
        return (new StateResource($state))
            ->additional([
                'msg' => [
                    'summary' => 'Registro Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ]);
    }

    public function destroys(DestroysStateRequest $request)
    {
        $states = State::whereIn('id', $request->input('ids'))->get();
        State::destroy($request->input('ids'));

        return (new StateCollection($states))
            ->additional([
                'msg' => [
                    'summary' => 'Registros Eliminados',
                    'detail' => '',
                    'code' => '201'
                ]
            ]);
    }
}
