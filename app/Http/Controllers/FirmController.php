<?php

namespace App\Http\Controllers;

use App\Http\Request\RegisterRequest;
use App\Http\Request\LoginRequest;
use App\Models\Firm;
use App\Models\Registred;
use App\Models\Status;
use App\Models\Invoice;
use Illuminate\Http\Request;

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
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $field=$request->input('FieldsetCheck');
       // dd(sha1($password));


       $firm=new Firm();
        $firm->mail=$mail;
        $firm->name=$name;
        $firm->pib=$pib;
        $firm->idnumber=$idnumber;
        $firm->accountnumber=$accountnumber;
        $firm->adress=$street.' '.$city;
        $firm->name=$name;
        $firm->save();
        $firmid=$firm->id;
        $registred=new Registred();
        $registred->idfirm=$firmid;
        $registred->password=sha1($password);
        $registred->active=1;
        $registred->save();

     if($firm->save()&&$registred->save()){

          return redirect()->route('login');
     }

      else{
         echo 'You are not registered,';
      }

}

public function log(Request $request)
{

    $firm = new Firm();
    $registred = new Registred();
    //$password=$req->get('password');
    // $mail=$request->get('mail');
    $registred->email = $request->get('mail');

    $registred->passwordlog = sha1($request->get('password'));
    // dd($request->get('mail'));
    // dd(sha1($request->get('password')));

    $result = $registred->login();
    // $result= $firm->join('firms', 'firms.id', '=', 'registreds.idfirm')->where(['password'=>sha1($password),'mail'=>$mail] )->get();
    // dd($result);
    //dd(sha1($password));
    // $result=Status::find(2)->invoice->where('invTax', 5);
    // dd($result);
    $res = $result->count();
    //dd($res);

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
        $menu=$this->data;
       // dd($menu);
        return view('pages.user.profile', $this->data);
}






}
