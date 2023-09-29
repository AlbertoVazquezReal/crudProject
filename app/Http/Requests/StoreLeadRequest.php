<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }
public function rules(){
    return[
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:clients',
        'phone' => 'nullable|string|max:20',
        ];
    }
}
