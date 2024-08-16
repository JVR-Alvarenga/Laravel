<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePostRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => 'required|min:3',
            'price' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator) : void {
        throw new HttpResponseException(response()->json([
            'error' => array_values($validator->errors()->getMessages())[0][0]
        ]));
    }
}
