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
    public function rules()
    {
        return [
            'message_template_id' => ['nullable', 'exists:message_templates,id'],
            'template_id' => ['nullable', 'exists:templates,id'],
            'mail_provider_id' => ['nullable', 'exists:mail_providers,id'],
            'recipients' => ['required', 'array'],
            'recipients.*' => ['exists:contacts,id'],
        ];
    }
}
