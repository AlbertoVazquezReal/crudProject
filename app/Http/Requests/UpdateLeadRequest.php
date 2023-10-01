<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;

class UpdateLeadRequest extends FormRequest{

public function rules(){

    return[
        'name' => 'required|string|max:255',
        'email' => ['required',
        'email',
        'max:255',
        Rule::unique('leads')->ignore($this->lead),
        ], 
        'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|string|max:20',
        ];
    
    }

public function failedValidation(Validator $validator)
    {
       throw new HttpResponseException(response()->json([
         'success'   => false,
         'message'   => 'Validation errors',
         'data'      => $validator->errors()
        ],JsonResponse::HTTP_BAD_REQUEST));
    }

    
}