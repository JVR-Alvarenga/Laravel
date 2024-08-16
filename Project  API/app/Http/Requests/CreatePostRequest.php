<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreatePostRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => 'required|min:3|string',
            'price' => 'required|numeric|min:0',
            'desciption' => 'string|max:255',
            'isNegotiable' => 'boolean',
            'user_id' => 'required|exists:users,id',
            'state_id' => 'required|exists:states,id',
            'category_id' => 'required|exists:categories,id' 
        ];
    }

    protected function failedValidation(Validator $validator) : void {
        throw new HttpResponseException(response()->json([
            'error' => array_values($validator->errors()->getMessages())[0][0]
        ]));
    }
}
