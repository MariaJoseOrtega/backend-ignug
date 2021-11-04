<?php

namespace App\Http\Requests\V1\LicenseWork\Holidays;

use App\Http\Requests\V1\LicenseWork\LicenseWorkFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreHolidayRequest extends FormRequest
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
        $rules = [
            'employee'=>['required'],
            'numberDays'=>['required'],
            'year'=>['required'],
        ];
        return LicenseWorkFormRequest::attributes($rules);
    }
    public function attributes()
    {
        $attributes = [
            'employee'=>'Empleado',
            'numberDays'=>'Número de días',
            'year'=>'Año De vacaciones',
        ];
        return LicenseWorkFormRequest::attributes($attributes);
    }
}
