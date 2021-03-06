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
            'logistics' => 'required|integer',
            'discounted_price' => ['required', new AmountValidator()],
            'truck_number' => 'required!max:255',
            'quantity_of_bags_accepted' => ['required', new DecimalValidator()],
            'number_of_bags_rejected' => 'required|numeric',
            //     'waybill' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048',
        ];
    }
}
