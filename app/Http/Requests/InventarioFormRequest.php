<?php

namespace sisSurtidor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioFormRequest extends FormRequest
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
            'cantidad_disponible'=>'required|numeric',
            'codigo_combustible'=>'required|max:50',
            'precio_compra'=>'required|numeric',
            'precio_venta'=>'required',
        ];
    }
}
