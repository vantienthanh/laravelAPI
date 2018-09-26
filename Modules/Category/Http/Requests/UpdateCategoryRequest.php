<?php

namespace Modules\Category\Http\Requests;

use Dingo\Api\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name"=>"required|max:10"
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => '123'
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
