<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can('edit contacts');
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'company'    => ['nullable', 'string', 'max:255'],
            'email'      => [
                'required',
                'email',
                Rule::unique('contacts')
                    ->ignore($this->contact->id)
                    ->where(fn ($query) => $query->where('user_id', auth()->id())),
            ],
            'phone'      => ['nullable', 'string', 'max:20'],
        ];
    }
}
