<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can('create contacts');
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
                'unique:contacts,email,NULL,id,user_id,' . auth()->id(),
            ],
            'phone'      => ['nullable', 'string', 'max:20'],
        ];
    }
}
