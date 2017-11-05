<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id= isset($this->segments()[2])? $this->segments()[2]: "";

        return [
            'name' => 'required|max:255',
            'email'=>['required','email',Rule::unique('users','email')->ignore($id)],

        ];
    }
}
