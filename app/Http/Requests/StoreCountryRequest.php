<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StoreCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('create countries');

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'code' => [
                'required',
                'unique:countries',
                'string',
                'size:3', // Ensure 3-letter country code (ISO)
            ],
        ];

        // Validate translations for each supported locale
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules["$localeCode.name"] = ['required', 'string', 'max:255'];
        }

        return $rules;
    }
}
