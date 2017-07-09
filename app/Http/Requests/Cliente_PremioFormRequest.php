<?php

namespace sisSurtidor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Cliente_PremioFormRequest extends FormRequest
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
            'ci_cliente'=>'numeric',
            'id_premio'=>'numeric',
            'cantidad'=>'numeric',
            'estado'=>'max:50',
        ];
    }
}
