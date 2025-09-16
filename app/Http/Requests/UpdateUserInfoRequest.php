<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
          return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'degree' => 'required',
            'experience' => 'required',
            'birth_day' => 'required|date|date_format:Y-m-d',
            'job' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
