<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DecimalValidator;
use App\Rules\AmountValidator;

class CreateLogisticsRequest extends FormRequest
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
            'order_id' => 'required|numeric',
            'aggregator_id' => 'required|numeric',
            'logistics_company_id' => 'required|numeric',
            'number_of_bags' => 'required|numeric',
            'quantity' => ['required', new DecimalValidator()],
            'truck_number' => 'required|max:8',
            'driver_name' => 'required|max:255',
            'driver_phone_number' => 'required|digits:11',
        ];
    }
}
