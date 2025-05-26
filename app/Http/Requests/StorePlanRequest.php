<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StorePlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can('create plans');
    }

    public function rules(): array
    {
        $rules = [
            'max_templates' => ['required', 'integer', 'min:1'],
            'ai_enabled' => ['required', 'boolean'],
            'price' => ['required', 'numeric', 'min:0'],
        ];

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules["$localeCode.name"] = ['required', 'string', 'max:255'];
            $rules["$localeCode.features"] = ['nullable', 'string']; // will be a JSON string
        }

        return $rules;
    }
}
