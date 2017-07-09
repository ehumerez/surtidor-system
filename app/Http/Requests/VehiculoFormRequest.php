<?php

namespace sisSurtidor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoFormRequest extends FormRequest
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
            'color'=>'required|max:50',
            'servicio'=>'required|max:50',
            'imagen'=>'mimes:jpeg,bmb,png',
            
        ];
    }
}
