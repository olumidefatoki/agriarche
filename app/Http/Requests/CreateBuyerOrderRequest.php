<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DecimalValidator;
use App\Rules\AmountValidator;

class CreateBuyerOrderRequest extends FormRequest
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
            'buyer_id' => 'required|numeric',
            'delivery_location' => 'required|max:255',
            'quantity' => ['required', new DecimalValidator()],
            'coupon_price' => ['required', new AmountValidator()],
            'commodity_id' => 'required',
            'state_id' => 'required|numeric',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
        ];
    }
}
