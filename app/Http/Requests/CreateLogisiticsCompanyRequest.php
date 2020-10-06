<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLogisiticsCompanyRequest extends FormRequest
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
            'name' => 'required|max:255|unique:logistics_company',
            'address' => 'required|max:255',
            'contact_person_name' => 'required|max:255',
            'contact_person_phone_number' => 'required|digits:11|unique:logistics_company',
            'state' => 'required|numeric',
        ];
    }
}
