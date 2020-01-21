<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecibosNominaRequest extends FormRequest
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
            'nombre' => 'required',
            'nss' => 'required|numeric|min:10',
            'closter_id' => 'required',
            'marca_id' => 'required',
            'recibo_nomina' => 'required|mimes:pdf',
        ];
    }
}
