<?php

namespace App\Http\Requests;
use App\Rules\AmountValidator;
use Illuminate\Foundation\Http\FormRequest;

class OrderMappingRequest extends FormRequest
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
            'strike_price' => ['required', new AmountValidator()],
            'aggregator' => 'required|numeric',
            'order' => 'required|numeric',
            'logistics_price'=>['required', new AmountValidator()],
        ];
    }
}
