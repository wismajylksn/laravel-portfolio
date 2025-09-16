<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'icon' => 'required',
            'name' => 'required|min:7',
            'description' => 'required|min:80|max:255',
        ];
    }
}
