<?php

namespace App\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends  FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "mail"=>"required|email",
            "name" => "required|min:4|max:20",
            "pib" => "required|min:9|max:9",
            "idnumber" => "required|min:8|max:8",
            "accountnumber" => "required|min:8|max:12",
            "city" => "required|min:4|max:30",
            "street"=>'required',
            "password"=>'required|confirmed|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            "password_confirmation"=>'required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            "FieldsetCheck"=>'accepted'
        ];
    }


}
