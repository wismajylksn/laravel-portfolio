<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|max:255',
            'subject_mail' => 'required|min:4|max:255',
            'content' => 'required|min:4|max:1000',
        ];
    }
}
