<?php

namespace App\Http\Controllers;

use App\Http\Request\ClientRequest;
use App\Http\Request\RegisterRequest;
use App\Http\Request\LoginRequest;
use App\Models\Client;
use App\Models\Firm;
use App\Models\Registred;
use App\Models\Status;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class FirmController extends BaseController
{

    public function store(RegisterRequest $request)
    {

        $mail=$request->input('mail');
        $name = $request->input('name');
        $pib = $request->input('pib');
        $idnumber = $request->input('idnumber');
        $accountnumber = $request->input('accountnumber');
        $street = $request->input('street');
        $city = $request->input('city');
        //dd(session('user'));
       if(!session()->has('user')){
            $password = $request->input('password');
            $password_confirmation = $request->input('password_confirmation');
            $field=$request->input('FieldsetCheck');
            // dd(sha1($password));

        }



       $firm=new Firm();
        $firm->mail=$mail;
        $firm->name=$name;
        $firm->pib=$pib;
        $firm->idnumber=$idnumber;
        $firm->accountnumber=$accountnumber;
        $firm->adress=$street.' '.$city;
        $firm->name=$name;
        $firm->save();
        //$firmid=$firm->id;
       // dd($firmid);
        if(session()->has('user')){
            $registred=new Registred();
            $registred->idfirm=$firm->id;
            $registred->password=sha1($password);
            $registred->active=1;
            $registred->save();


        }


     if($firm->save()&&$registred->save()){

          return redirect()->route('login');
     }

      else{
         echo 'You are not registered,';
      }

}

public function log(Request $request)
{
    $registred = new Registred();
    $registred->email = $request->get('mail');
    $registred->passwordlog = sha1($request->get('password'));
    $result = $registred->login();
    $res = $result->count();
    if ($res) {
        $request->session()->put('user', $result);
        return redirect()->route('profile');
    } else {
        return redirect()->back()->with("warning", "Wrong username or password.");
    }

}

    public function logout()
    {
        session()->forget('user');
        return redirect(route("login"));
    }

public function user(){
        return view('pages.user.profile', $this->data);
}

    public function update(Request  $request, $id){
       /* $rules = [
            "mail" => "required|email",
            "name" => "required|min:4|max:20",
            "pib" => "required|min:9|max:9",
            "idnumber" => "required|min:8|max:8",
            "accountnumber" => "required|min:8|max:12",

            "street" => 'required'
        ];
         $validator = \Validator::make($request->all(), $rules);
         $validator->validate();*/

        $validator = Validator::make($request->all(), [
            "mail" => "required|email",
            "name" => "required|min:4|max:20",
            "pib" => "required|min:9|max:9",
            "idnumber" => "required|min:8|max:8",
            "accountnumber" => "required|min:8|max:12",

            "street" => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/user/clients')
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();



       // $request->all();
        // dd($request->input('mail'));

        $mail = $request->get('mail');
        $name = $request->input('name');
        $pib = $request->input('pib');
        $idnumber = $request->input('idnumber');
        $accountnumber = $request->input('accountnumber');
        $street = $request->input('street');
        // $city = $request->input('city');
        $firm = Firm::where('id', '=', $id)->first();
        $firm->mail=$mail;
        $firm->name=$name;
        $firm->pib=$pib;
        $firm->idnumber=$idnumber;
        $firm->accountnumber=$accountnumber;
        $firm->adress=$street;
        $firm->name=$name;
        $firm->save();

    }






}
