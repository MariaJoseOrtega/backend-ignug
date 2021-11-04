<?php

namespace App\Http\Requests\V1\LicenseWork\Forms;

use App\Http\Requests\V1\LicenseWork\LicenseWorkFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class IndexFormRequest extends FormRequest
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


        ];
        return LicenseWorkFormRequest::rules($rules);
    }
    public function attributes()
    {
        $attributes = [

        ];
        return LicenseWorkFormRequest::attributes($attributes);
    }
}
