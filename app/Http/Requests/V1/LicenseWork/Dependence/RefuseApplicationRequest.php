<?php

namespace App\Http\Requests\V1\LicenseWork\Dependence;

use App\Http\Requests\V1\LicenseWork\LicenseWorkFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RefuseApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'code'=>['required'],
            'dependence.id'=>['required'],
        ];

        return LicenseWorkFormRequest::rules($rules);
    }

    public function attributes()
    {
        $attributes = [
            'code'=>'codigo',
            'dependence.id'=>'departamento',
        ];
        return LicenseWorkFormRequest::attributes($attributes);

    }
}

