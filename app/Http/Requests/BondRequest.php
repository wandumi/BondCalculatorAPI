<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BondRequest extends FormRequest
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
            'electronic_ins_fee' => "numeric",
            'korbitec_gen_fee' => "numeric",
        ];
    }
}
