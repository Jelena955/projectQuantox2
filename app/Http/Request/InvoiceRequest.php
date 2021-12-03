<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           // "client"=>"required",
            "dateissue" =>"required",
            "duedate"=>"required",
            "invTax"=>"required",
           "paid"=>"required",
           "notes"=>"required"

        ];
    }



}
