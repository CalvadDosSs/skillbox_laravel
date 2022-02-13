<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TagsFormRequest extends FormRequest
{
    public function prepareForValidation()
    {
        return collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });
    }

    public function rules()
    {
        return [
            'tag' => '',
        ];
    }
}
