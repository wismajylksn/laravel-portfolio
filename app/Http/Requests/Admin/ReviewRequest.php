<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:4',
            'job' => 'required',
            'description' => 'required|min:10|max:255',
            'image' => $this->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg|max:2048'
                     : 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
