<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
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
            'quantity' => 'required',
            'paper_sizer' => 'required',
            'paper_type' => 'required',
            'file' => 'required',
            'colored' => 'required',
            'stapled' => 'required',
            'front_back' => 'required',
        ];
    }
}