<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuaStoreRequest extends FormRequest
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
            'num_mes' => 'required',
            'year' => 'required',
            'cedula_determinacion_cuotas' => 'required|mimes:pdf'
            'resumen_liquidacion' => 'required|mimes:pdf'
            'pago_sua' => 'required|mimes:pdf',
        ];
    }
}
