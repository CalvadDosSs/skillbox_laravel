<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TagsFormRequests extends FormRequest
{
    public function prepareForValidation()
    {
        return collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });
    }
}
