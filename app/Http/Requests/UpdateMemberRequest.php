<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMemberRequest extends FormRequest
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
            'code' => ['required', 'alpha', 'size:3', Rule::unique('members')->ignore($this->id)],
            'position' => 'required',
            'generation' => 'required',
            'batch_year' => 'required',
            'status' => 'required',
        ];
    }
}
