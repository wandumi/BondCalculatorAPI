<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'start_amount' => 'required|numeric',
            'end_amount' => 'required|numeric',
            'vat_amount' => 'required|numeric|max:4',
            'rate_applications' => 'numeric',
            'korbitec_gen_fee' => 'numeric'
        ];
    }
}
