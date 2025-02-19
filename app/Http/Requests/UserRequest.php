<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'thumbnail' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|regex:/^[A-Za-z\s]+$/|max:45',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|min:8|regex:/^[\S]+$/',
            'phone' => 'required|digits:10|regex:/^[0-9]+$/',
            'role' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'thumbnail.image' => 'The uploaded file must be an image!',
            'thumbnail.mimes' => 'Only image file formats (jpeg, png, jpg, gif, svg) are allowed!',
            'thumbnail.max' => 'Image must not exceed 2048 characters!',
            'name.required' => 'Name cannot be empty!',
            'name.regex' => 'Name can only contain letters!',
            'name.max' => 'Name must not exceed 45 characters!',
            'email.required' => 'Email cannot be empty!',
            'email.email' => 'Email must be in the correct format!',
            'email.unique' => 'Email has already been used!',
            'email.max' => 'Email must not exceed 100 characters!',
            'password.required' => 'Password cannot be empty!',
            'password.min' => 'Password must be at least 8 characters long!',
            'password.regex' => 'Password can only contain letters, numbers, and some special characters!',
            'phone.required' => 'Phone cannot be empty!',
            'phone.digits' => 'Phone must not exceed 10 characters!',
            'phone.regex' => 'Phone must be a number!',
            'role.required' => 'Role cannot be empty!',
        ];
    }
}
