<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUserRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => 'required|min:3|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|string',
            'state_id' => 'required|exists:states,id'
        ];
    }

    protected function failedValidation(Validator $validator) : void {
        throw new HttpResponseException(response()->json([
            'error' => array_values($validator->errors()->getMessages())[0][0]
        ]));
    }
}
