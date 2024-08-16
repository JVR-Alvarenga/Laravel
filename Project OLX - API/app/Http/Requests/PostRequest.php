<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => 'required|min:3',
            'price' => 'required',
            'user_id' => 'required',
            'state_id' => 'required',
            'category_id' => 'required' 
        ];
    }

    protected function failedValidation(Validator $validator): void {
        throw new HttpResponseException(response()->json([
            'error' => array_values($validator->errors()->getMessages())[0][0]
        ]));
    }
}
