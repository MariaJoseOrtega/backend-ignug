<?php

namespace App\Http\Requests\V1\LicenseWork\Applications;

use Illuminate\Foundation\Http\FormRequest;

class DestroysApplicationRequest extends FormRequest
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
        return [
            'ids' => ['required'],
        ];
    }
    public function attributes()
    {
        return [
            'ids' => 'ID`s de las solicitudes',
        ];
    }
}
