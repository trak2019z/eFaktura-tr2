<?php

namespace App\Http\Requests;

use App\Client;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required_if:category,==,1|max:255',
            'NIP' => 'required_if:category,==,1|nullable|regex:/[0-9]{10}/|max:12',
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'street' => 'required|max:255',
            'town' => 'required|max:255',
            'postcode' => 'required|max:255|regex:/[0-9]{2}-[0-9]{3}$/',
            'postcode_town' => 'nullable|max:255|different:town',
            'property_number' => 'required|max:255',
            'phone_number' => 'required|max:25',
            //'category' => 'required|regex:/[1-2]{1}/|max:1',
        ];
    }

    public function messages()
    {
        return [
            'NIP.required_if' => 'Pole wymygane jeśli wybrano firmę',
            'name.required_if' => 'Pole wymygane jeśli wybrano firmę',
            'name.required' => "Pole Nazwa firmy jest wymagane",
            'firstName.required' => "Pole Imię jest wymagane",
            'lastName.required' => "Pole Nazwisko jest wymagane",
            'street.required' => "Pole Ulica jest wymagane",
            'town.required' => "Pole Miejscowość jest wymagane",
            'postcode.required' => "Pole Kod Pocztowy jest wymagane",
            'postcode_town.required' => "Pole Poczta jest wymagane",
            'property_number.required' => "Pole Numer Domu/Lokalu jest wymagane",
            'NIP.max' => "Nip jest zbyt długi",
            'NIP.regex' => "NIP (bez spacji i myślników)",
            'postcode_town.*' => "Zaznacz: poczta w tej samej miejscowości",
        ];
    }

}
