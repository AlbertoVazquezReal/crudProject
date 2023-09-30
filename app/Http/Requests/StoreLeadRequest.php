<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest{

public function rules(){
    return[
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:clients',
        'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|string|max:20',
        ];
    }

public function failedValidation(Validator $validator)
{
   throw new HttpResponseException(response()->json([
     'success'   => false,
     'message'   => 'Validation errors',
     'data'      => $validator->errors()
   ]));
}
}
