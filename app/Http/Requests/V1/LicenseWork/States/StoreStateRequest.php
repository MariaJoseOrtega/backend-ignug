<?php

namespace App\Http\Requests\V1\LicenseWork\States;

use Illuminate\Foundation\Http\FormRequest;

class StoreStateRequest extends FormRequest
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
            'name'=>['required'],
            'code'=>['required'],
        ];
    }
    public function attributes()
    {
        $attributes = [
            'name'=>'nombre del estado',
            'code'=>'nombre del estado',
        ];
        return $attributes;
    }
}