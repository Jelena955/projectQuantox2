<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends  FormRequest
{






    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "mail" => "required|email",
            "name" => "required|min:4|max:20",
            "pib" => "required|min:9|max:9",
            "idnumber" => "required|min:8|max:8",
            "accountnumber" => "required|min:8|max:12",

            "street" => 'required'

        ];
    }




}
