<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUrlRequest extends FormRequest
{


    public function rules()
    {
        return [
            'url' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (filter_var($value, FILTER_VALIDATE_URL) === FALSE) {
                        $fail($attribute . ' ошибочный.');
                    }
                }
            ]
        ];
    }
}
