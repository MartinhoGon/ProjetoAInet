<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|alpha_dash',
            'email' => 'required|email',
            'phone' => 'required|size:9|alpha_num',
            'password' => 'min:8|same:password_confirmation'
            'department_id' => 'required|between:1,9'
            'profile_photo' => 'image'
            'profile_url' => 'url'
            'presentation' => 'alpha_dash'
        ];
    }
}
