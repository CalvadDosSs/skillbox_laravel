<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'required|',
            'title' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'body' => 'required',
            'publication' => '',
        ];
    }
}
