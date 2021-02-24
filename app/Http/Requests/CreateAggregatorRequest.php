<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAggregatorRequest extends FormRequest
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
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'contact_person_name' => 'required|max:255',
            'contact_person_email' => 'nullable|email|max:255',
            'contact_person_phone_number' => 'required|digits:11|unique:aggregator',
            'state' => 'required|max:255',
            'bank' => 'required|max:255',
            'account_name' => 'required|max:255',
            'account_number' => 'required|digits:10|unique:aggregator',
        ];
    }
}
