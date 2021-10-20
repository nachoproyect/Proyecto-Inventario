<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloCreateRequest extends FormRequest
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
            
            
            'serial'=>'nullable:articulos|unique:articulos,serial',
            'estante'=>'nullable:articulos|unique:articulos,estante',
            'categoria_id'=>'required:articulos',
            'marca_id'=>'required:articulos',
            'faja'=>'nullable:articulos|unique:articulos,faja',
            'precinto'=>'nullable:articulos|unique:articulos,precinto'

        ];
    }
}
