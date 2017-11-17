<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonaFormRequest extends Request
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
            //
            
            'nombre'=>'required|max:90',
            'tipo_documento'=>'required|max:90',
            'num_documento'=>'required|max:90',
            'direccion'=>'required|max:130',
            'telefono'=>'required|min:10|numeric',
            'email'=>'required|max:90|email'
        ];
    }
}
