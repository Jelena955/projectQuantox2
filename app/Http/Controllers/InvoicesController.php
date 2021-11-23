<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Invoice;
use App\Models\Registred;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoicesController extends BaseController
{


    public $inoices = [];
    public $idinvoices = [];
    public function show(Request $request)
    {
        $result = $request->session()->get('user');
        $id = $result[0]->idregistred;
        $idinvoice = Registred::find($id)->invoice;
        //dd($idinvoice);

        foreach ($idinvoice as $invoice) {

            $invoicemodel = new Invoice();
            $invoicemodel->idinv = $invoice->id;
           // dd($invoicemodel->idinv);
            $invoiceshow = $invoicemodel->show();
          // dd($invoicemodel->show());
            array_push($this->inoices, $invoiceshow);
        }
        $this->data['invoices'] = $this->inoices;
       return view('pages.user.invoices', $this->data);
    }

    public function addinvoice(Request $request)
    {

        $this->data['firms']=Session::get('data');
       // dd( $this->data['firms']);
       return view('pages.user.addinvoice', $this->data);
    }

}
