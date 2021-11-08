<?php

namespace App\Http\Controllers;
use App\Models\City;

class CitiesController extends BaseController
{

   // public $data;
    public function index() {
        $this->data["cities"] =City::all() ;


        $cities= City::all();
        return view('pages.welcome', $this->data);
    }

}
