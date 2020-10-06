<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DecimalValidator;
use App\Rules\AmountValidator;

class DeliveryRequest extends FormRequest
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
            'logistics' => 'required|numeric',
            'discounted_price' => ['required', new AmountValidator()],
            'number_of_bags_accepted' => 'required|numeric',
            'truck_number' => 'required!max:255',
            'quantity_of_bags_accepted' => ['required', new DecimalValidator()],
            'number_of_bags_rejected' => 'required|numeric',
            'quantity_of_bags_rejected' => ['required', new DecimalValidator()],
            'waybill' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048',
        ];
    }
}
