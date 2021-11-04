<?php

namespace App\Http\Requests\V1\LicenseWork\Reasons;

use App\Http\Requests\V1\LicenseWork\LicenseWorkFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreReasonRequest extends FormRequest
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
        $rules= [
            
            'name'=>['required'],
            'descriptionOne'=>['required'],
            'descriptionTwo'=>['required'],
            'discountableHolidays'=>['required'],
            'daysMin'=>['required'],
            'daysMax'=>['required'],

        ];
        return LicenseWorkFormRequest::rules($rules);
    }


    public function attributes()
    {
        $attributes = [
            'name'=>'nombre',
            'descriptionOne'=>'descripcion uno',
            'descriptionTwo'=>'descripcion dos',
            'discountableHolidays'=>'vaciones descontables',
            'daysMin'=>'dias minimos',
            'daysMax'=>'dias maximos',
        ];
        return LicenseWorkFormRequest::attributes($attributes);
    }
}
