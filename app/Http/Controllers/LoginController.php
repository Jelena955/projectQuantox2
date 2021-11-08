<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Models\Firm;
use App\Models\Registred;

class LoginController extends BaseController
{


    public function log(LoginRequest $request){
        $mail=$request->input('mail');
        $password = $request->input('password');

        $result= Firm::addSelect([ 'mail' => Registred::select('mail')
            ->whereColumn('mail', $password)

        ])->get();
        dd($result);
       // return view('pages.welcome');



    }
}
