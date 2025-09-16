<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QualificationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'association' => 'required|min:3',
            'description' => 'required|min:3',
            'type' => 'required',
            'from' => 'required|min:4',
            'to' => 'required|min:4',
        ];
    }
}
