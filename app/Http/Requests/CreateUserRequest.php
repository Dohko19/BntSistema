<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
        $rules =[
            'name' => 'required|min:2',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|confirmed',
            'roles' => 'required',
            'closter_id' => 'required',
            'marca_id' => 'required'
        ];

        return $rules;
    }
}
