<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'mail_provider_id' => ['required', 'integer', 'exists:mail_providers,id'],
            'message_template_id' => ['nullable', 'integer', 'exists:message_templates,id'],
            'template_id' => ['nullable', 'integer', 'exists:templates,id'],
            'recipients' => ['required', 'array', 'min:1'],
            'recipients.*' => ['integer', 'exists:contacts,id'],
        ];
    }
}