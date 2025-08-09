<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Only allow if user is authenticated
        return \Illuminate\Support\Facades\Auth::check();
    }

    public function rules(): array
    {
        return [
            'amount' => ['required', 'numeric', 'min:0.01'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['nullable', 'string', 'max:255'],
            'date' => ['required', 'date'],
        ];
    }
}
