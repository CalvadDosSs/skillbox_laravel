<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'required|unique:news',
            'title' => 'required|min:5|max:80',
            'body' => 'required',
            'publication' => '',
            'user_id' => '',
        ];
    }
}
