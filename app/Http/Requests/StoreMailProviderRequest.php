<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMailProviderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'provider'      => ['required', 'string', 'max:255'],
            'account_name'  => ['required', 'string', 'max:255'],
            'email'         => ['required', 'email', 'max:255'],
            'password'      => ['required', 'string', 'min:6'], 
        ];
    }
}
