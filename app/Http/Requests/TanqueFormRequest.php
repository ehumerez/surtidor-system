<?php

namespace sisSurtidor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TanqueFormRequest extends FormRequest
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
            'capacidad_disponible'=>'numeric',
            'capacidad_minima'=>'numeric',
            'capacidad_maxima'=>'numeric',
            'codigo_combustible'=>'numeric',
            'estado'=>'numeric',        
            ];
    }
}
