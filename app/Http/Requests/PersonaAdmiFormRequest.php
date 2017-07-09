<?php

namespace sisSurtidor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaAdmiFormRequest extends FormRequest
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
            'nombre'=>'required|max:50',
            'apellido_paterno'=>'required|max:50',
            'apellido_materno'=>'required|max:50',
            'tipo_p'=>'required',
        ];
    }
}
