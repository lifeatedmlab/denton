<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'code' => 'required|alpha|unique:users|size:3',
            'nim' => 'required',
            'generation' => 'required',
            'batch_year' => 'required',
            'status' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];
    }
}
