<?php

namespace App\Http\Requests\V1\LicenseWork\Dependence;

use App\Http\Requests\V1\LicenseWork\LicenseWorkFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreDependenceRequest extends FormRequest
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
        $rules =  [
            'name'=>['required'],
            'level'=>['required'],
        ];

        return LicenseWorkFormRequest::rules($rules);
    }

    public function attributes()
    {
        $attributes = [
            'name'=>'nombre',
            'level'=>'nivel',
        ];
        return LicenseWorkFormRequest::attributes($attributes);

    }
}
