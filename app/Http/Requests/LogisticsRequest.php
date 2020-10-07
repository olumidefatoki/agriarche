<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DecimalValidator;
use App\Rules\AmountValidator;

class LogisticsRequest extends FormRequest
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
            'order' => 'required|numeric',
            'aggregator' => 'required|numeric',
            'logistics_company' => 'required|numeric',
            'number_of_bags' => 'required|numeric',
            'quantity' => ['required', new DecimalValidator()],
            'truck_number' => 'required|max:8',
            'driver_name' => 'required|max:255',
            'driver_phone_number' => 'required|digits:11',
            'logistics_amount'=> ['required', new DecimalValidator()],
            'payment_type'=>'required|max:255',
        ];
    }
}
