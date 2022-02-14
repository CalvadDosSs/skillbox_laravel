<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TagsFormRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge(['tags' => collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; })]);
    }

    public function rules()
    {
        return [
            'name' => '',
        ];
    }
}
