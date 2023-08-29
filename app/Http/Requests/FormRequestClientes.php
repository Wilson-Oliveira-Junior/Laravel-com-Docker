<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestClientes extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $req = [];
        if($this->method()=='POST' || $this->method()=='PUT'){
            $req = [
               'nome' => 'required',
            ];
        }
        return $req;
    }
}
