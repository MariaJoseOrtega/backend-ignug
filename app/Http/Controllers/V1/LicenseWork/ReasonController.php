<?php

namespace App\Http\Controllers\V1\LicenseWork;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LicenseWork\Reasons\IndexReasonRequest;
use App\Http\Requests\V1\LicenseWork\Reasons\StoreReasonRequest;
use App\Http\Requests\V1\LicenseWork\Reasons\UpdateReasonRequest;
use App\Http\Requests\V1\LicenseWork\Reasons\DestroysReasonRequest;
use App\Http\Resources\V1\LicenseWork\ReasonCollection;
use App\Http\Resources\V1\LicenseWork\ReasonResource;
use Illuminate\Http\Request;
use App\Models\LicenseWork\Reason;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(IndexReasonRequest $request)
    {
        $sorts = explode(',', $request->sort);

        $reasons = Reason::customOrderBy($sorts)
            ->name($request->input('name'))
            ->descriptionOne($request->input('description_one'))
            ->descriptionTwo($request->input('description_two'))
            ->paginate($request->per_page);


        return (new ReasonCollection($reasons))
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReasonRequest $request)
    {
        $reason = new Reason();
        $reason->name = $request->input('name');
        $reason->description_one = $request->input('descriptionOne');
        $reason->description_two = $request->input('descriptionTwo');
        $reason->discountable_holidays = $request->input('discountableHolidays');
        $reason->days_min = $request->input('daysMin');
        $reason->days_max = $request->input('daysMax');
        $reason->save();

        return (new ReasonResource($reason))
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reason $reason)
    {
        return (new ReasonResource($reason))
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReasonRequest $request, Reason $reason)
    {

        $reason->name = $request->input('name');
        $reason->description_one = $request->input('descriptionOne');
        $reason->description_two = $request->input('descriptionTwo');
        $reason->discountable_holidays = $request->input('discountableHolidays');
        $reason->days_min = $request->input('daysMin');
        $reason->days_max = $request->input('daysMax');
        $reason->save();

        return (new ReasonResource($reason))
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reason $reason)
    {
        $reason->delete();
        return (new ReasonResource($reason))
            ->additional([
                'msg' => [
                    'summary' => 'Registro Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ]);
    }

    public function destroys(DestroysReasonRequest $request)
    {
        $reasons = Reason::whereIn('id', $request->input('ids'))->get();
        Reason::destroy($request->input('ids'));

        return (new ReasonCollection($reasons))
            ->additional([
                'msg' => [
                    'summary' => 'Registros Eliminados',
                    'detail' => '',
                    'code' => '201'
                ]
            ]);
    }
    // seleccionar la razon por la cual se esta solicitando la licencia o permiso
    public function indexReason(IndexReasonRequest $request){

        $sorts = explode(',', $request->sort);
        $reasons = Reason::customOrderBy($sorts)
            ->name($request->input('name'))
            ->descriptionOne($request->input('description_one'))
            ->descriptionTwo($request->input('description_two'));


        return (new ReasonCollection($reasons))
            ->additional([
                'msg' => [
                    'summary' => 'success',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    public function catalogue(IndexReasonRequest $request)
    {
        $reasons= Reason::get();

        return (new ReasonCollection($reasons))
            ->additional([
                'msg' => [
                    'summary' => 'success',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

}
