<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest
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
            'quantity' => 'required|alpha_num',
            'paper_size' => 'required|between:3,4',
            'paper_type' => 'required|between:0,2',
            'file' => 'required|file',
            'colored' => 'required|between:0,1',
            'stapled' => 'required|between:0,1',
            'front_back' => 'required|between:0,1',
            //'description' => 'alpha_dash',
            'due_date' => 'required|date'
        ];
    }
}
