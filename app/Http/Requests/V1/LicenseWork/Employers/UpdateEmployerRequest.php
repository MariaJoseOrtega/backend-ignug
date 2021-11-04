<?php

namespace App\Http\Requests\V1\LicenseWork\Employers;

use App\Http\Requests\V1\LicenseWork\LicenseWorkFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployerRequest extends FormRequest
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
            'logo'=>['required'],
            'department'=>['required'],
            'coordination'=>['required'],
            'unit'=>['required'],
            'approvalName'=>['required'],
            'registerName'=>['required'],
        ];
        return LicenseWorkFormRequest::rules($rules);
    }
    public function attributes()
    {
        $attributes = [
            'logo'=>'Logo SENECYT',
            'department'=>'Departamento SENECYT',
            'coordination'=>'Coordinación',
            'unit'=>'Unidad',
            'approvalName'=>'Nombre de quien aprueba',
            'registerName'=>'SENECYT Talento Humano',
        ];
        return LicenseWorkFormRequest::attributes($attributes);
    }
}

