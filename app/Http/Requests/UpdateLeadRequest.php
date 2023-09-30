<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
}