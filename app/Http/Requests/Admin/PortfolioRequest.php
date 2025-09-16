<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:4',
            'project_url' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'image' => $this->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg|max:2048'
                    : 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
