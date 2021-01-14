<?php

namespace App\Http\Requests;

use App\Rules\DecimalValidator;
use App\Rules\AmountValidator;
use Illuminate\Foundation\Http\FormRequest;

class ProcessorOrderRequest extends FormRequest
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
            'processor' => 'required|numeric',
            'delivery_location' => 'required|max:255',
            'quantity' => ['required', new DecimalValidator()],
            'price' => ['required', new AmountValidator()],
            'commodity' => 'required|numeric',
            'state' => 'required|numeric',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
        ];
    }
}
