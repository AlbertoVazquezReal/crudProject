<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLeadRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }
public function rules(){
    
    return[
        'name' => 'required|string|max:255',
        'email' => ['required',Rule::unique('clients')->ignore($this->email, 'email')],
        'phone' => 'nullable|string|max:20',
        ];
    
    }
}