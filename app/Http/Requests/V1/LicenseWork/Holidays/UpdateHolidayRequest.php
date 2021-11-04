<?php

namespace App\Http\Requests\V1\LicenseWork\Holidays;

use App\Http\Requests\V1\LicenseWork\LicenseWorkFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHolidayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
<<<<<<< HEAD
        $rules = [
            'logo'=>['required'],
            'department'=>['required'],
            'coordination'=>['required'],
            'unit'=>['required'],
            'approvalName'=>['required'],
            'registerName'=>['required'],
=======
        return [
            'employee_id'=>['required'],
            'code'=>['required'],
            'numberDays'=>['required'],
            'year'=>['required'],
>>>>>>> 281e2707b4549da147780a5b0f2b6bf3b0daad52
        ];
        return LicenseWorkFormRequest::attributes($rules);
    }
    public function attributes()
    {
        $attributes = [
            'employee_id'=>'Empleado',
            'code'=>'Código',
            'numberDays'=>'Número de días',
            'year'=>'Año De vacaciones',
        ];
        return LicenseWorkFormRequest::attributes($attributes);
    }
}

