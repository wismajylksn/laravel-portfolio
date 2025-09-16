<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'color' => 'required|min:7',
            'percent' => 'required|numeric|gt:0|lte:100',
        ];
    }
}
