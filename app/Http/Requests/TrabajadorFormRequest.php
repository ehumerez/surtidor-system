<?php

namespace sisSurtidor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajadorFormRequest extends FormRequest
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
            'ci_nit_p'=>'numeric',
            'direccion'=>'max:50',
            'email'=>'max:50',
            'tipo'=>'max:50',
            'fecha_inicio'=>'max:50',
        ];
    }
}
