<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTemplateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can('edit templates');
    }

    public function rules(): array
    {
        return [
            'plan_ids' => ['required', 'array'],
            'plan_ids.*' => ['exists:plans,id'],
            'name' => ['required', 'string', 'max:255'],
            'view_path' => ['required', 'string', 'max:255'],
        ];
    }
}
