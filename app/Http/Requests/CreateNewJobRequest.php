<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => 'required|max:255',

            'company' => 'required|max:255',

            'description' => 'required',

            'location' => 'required',

            'website' => 'required|url',

            'logo' => 'image|max:5120|mimes:jpg,png,jpeg',

            'email' => 'required|email',

            'tags' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'company' => 'company name',
            'title' => 'job title',
            'description' => 'job description',
            'website' => 'company website url',
            'location' => 'job location',
        ];
    }
}
