<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            [
                'title' => 'required',
                'content' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'title.required' => 'Title is required',
                'content.required' => 'Content is required',
                'image.required' => 'Image is required',
                'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg',
                'image.max' => 'Image may not be greater than 2048 kilobytes',
            ]
        ];
    }
}
