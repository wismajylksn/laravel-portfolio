<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'about_title' => 'required|min:3',
            'about_description' => 'required|min:10',
            'fb_url' => 'required|url',
            'github_url' => 'required|url',
            'linkedin_url' => 'required|url',
            'freelance_url' => 'required|url',
            'cv_url' => 'required|url',
            'video_url' => 'required|url',
            'contact_mail' => 'required|email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
