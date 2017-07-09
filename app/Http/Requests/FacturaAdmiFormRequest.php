<?php

namespace sisSurtidor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturaAdmiFormRequest extends FormRequest
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
            'cantidad_combustible'=>'required|numeric',
            'detalle'=>'required',
            'ci_persona'=>'required',
            'ci_trabajador'=>'required',
            'placa_v'=>'required',
            'id_manguera'=>'required',
        ];
    }
}
