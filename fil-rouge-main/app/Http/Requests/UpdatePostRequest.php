<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required|string',
            'image.*' => 'nullable|image|max:2048', // Max 2MB image file size for each file
        ];
    }
}
