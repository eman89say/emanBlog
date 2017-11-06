<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class PermissionRequest extends FormRequest
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
        $id= isset($this->segments()[2])? $this->segments()[2]: "";

        return [
            'display_name' => 'sometimes|required|max:255',
            'name'=>['sometimes','required','max:255','alpha_dash',Rule::unique('permissions','name')->ignore($id)],
            'description' => 'sometimes|max:255',
            'resource'=>'sometimes|required|min:3|max:100|alpha'

        ];
    }
}
