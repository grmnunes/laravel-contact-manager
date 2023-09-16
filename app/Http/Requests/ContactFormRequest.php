<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactFormRequest extends FormRequest
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
        $rules = [
        'name' => ['required', 'min:5'],
        'email' => ['required', 'email', Rule::unique('contacts', 'email')->ignore($this->contact)],
        'contact_number' => ['required', 'min:9', 'max:9', Rule::unique('contacts', 'contact_number')->ignore($this->contact)],
        ];

        return $rules;
    }
}
