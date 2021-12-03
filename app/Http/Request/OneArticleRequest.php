<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class OneArticleRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name"=>"required",
            "description"=>"required",
            "price"=>"required",
            "quantity"=>"required",
            "discount"=>"required",
            "itemTax"=>"required"


        ];
    }















}
