<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Firm;
use App\Models\Registred;
use Illuminate\Http\Request;

class ClientsController extends BaseController
{
    public $firms=[];
    public $idfirms=[];
    public function clients()
    {


        return view('pages.user.clients', $this->data);
    }

    public function addclient(){

        return view('pages.user.addclient', $this->data);
    }

    public function show(Request $request){
        $result=$request->session()->get('user');
        $id=$result[0]->idregistred;
        $idfirm=Registred::find($id)->clientfirm;

       foreach($idfirm as $firm){

           $firmmodel=new Firm();
           $firmmodel->id=$firm->idfirm;
           $firmshow=$firmmodel->show();
            array_push($this->firms,$firmshow);
           }
           $this->data['firms']=$this->firms;
          return view('pages.user.clients', $this->data);
  }
}
