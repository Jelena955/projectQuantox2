<?php

namespace App\Http\Controllers;
use App\Http\Request\ClientRequest;
use App\Http\Request\RegisterRequest;
use App\Models\Client;
use App\Models\Firm;
use App\Models\Registred;
use Illuminate\Http\Request;

class ClientsController extends BaseController
{
    public $firms = [];
    public $idfirms = [];

    public function clients()
    {


        return view('pages.user.clients', $this->data);
    }

    public function addclient()
    {

        return view('pages.user.addclient', $this->data);
    }

    public function show(Request $request)
    {
        $result = $request->session()->get('user');
        $id = $result[0]->idregistred;
        $idfirm = Registred::find($id)->clientfirm;

        foreach ($idfirm as $firm) {

            $firmmodel = new Firm();
            $firmmodel->idf = $firm->idfirm;
            $firmshow = $firmmodel->show();
            array_push($this->firms, $firmshow);
        }
        $this->data['firms'] = $this->firms;
        return view('pages.user.clients', $this->data);
    }

    public function store(ClientRequest $request)
    {

        $mail = $request->input('mail');
        $name = $request->input('name');
        $pib = $request->input('pib');
        $idnumber = $request->input('idnumber');
        $accountnumber = $request->input('accountnumber');
        $street = $request->input('street');
        $city = $request->input('city');
        //dd(session('user'));

        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $field = $request->input('FieldsetCheck');
        // dd(sha1($password));


        $firm = new Firm();
        $firm->mail = $mail;
        $firm->name = $name;
        $firm->pib = $pib;
        $firm->idnumber = $idnumber;
        $firm->accountnumber = $accountnumber;
        $firm->adress = $street . ' ' . $city;
        $firm->name = $name;
        $firm->save();
        //$firmid=$firm->id;
        // dd($firmid);
        $session=session()->get('user');
       // dd( $session=session()->get('user'));

        $client=new Client();
        $client->idfirm=$firm->id;
        $client->idregitred=$session[0]->idregistred;
        $client->save();
    }
}
