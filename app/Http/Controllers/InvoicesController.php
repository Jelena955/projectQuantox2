<?php

namespace App\Http\Controllers;


use App\Http\Request\OneArticleRequest;
use App\Models\Firm;
use App\Models\Invoice;
use App\Models\OneArticleInvoice;
use App\Models\Registred;
use Illuminate\Http\Request;
use App\Http\Request\InvoiceRequest;
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
           //dd($invoicemodel->idinv);
            $invoiceshow = $invoicemodel->show();
          // dd($invoicemodel->show());
            array_push($this->inoices, $invoiceshow);
        }
        $this->data['invoices'] = $this->inoices;
       return view('pages.user.invoices', $this->data);
    }

    public function addinvoice()
    {

        $this->data['firms']=Session::get('data');
       // dd( $this->data['firms']);
       return view('pages.user.addinvoice', $this->data);
    }

    public function doAdd(InvoiceRequest $request, OneArticleRequest $requestArticle){











        $client=$request->input('client');

        $dateissue=$request->input('dateissue');
        $duedate=$request->input('duedate');
       // $idstatus=$request->input();
        $invTax=$request->input('invTax');
        $paid=$request->input('paid');
        $notes=$request->input('notes');

        $invoice=new Invoice();
        $oneArticle=new OneArticleInvoice();
        $session=session()->get('user');

        $invoice->idregitred=$session[0]->idregistred;
        $invoice->idclient=$client;
        $invoice->dateOfIssue=$dateissue;
        $invoice->dueDate=$duedate;
        $invoice->invTax=$invTax;
        $invoice->paid=$paid;
        $invoice->notes=$notes;
        $invoice->idstatus=2;
        $invoice->save();
       // return redirect()->action([ClientsController::class, 'show']);
        $count= count($requestArticle->name);
        // dd($count);
        for($i=0;$i<$count;$i++) {

            //dd($requestArticle->input("name")[0]);
            $name = $requestArticle->input("name")[$i];
            $description = $requestArticle->input("description")[$i];
            $price = $requestArticle->input("price")[$i];
            $quantity = $requestArticle->input("quantity")[$i];
            $discount = $requestArticle->input("discount")[$i];
            $itemTax = $requestArticle->input("itemTax")[$i];

            $oneArticle = new OneArticleInvoice();
            $oneArticle->name = $name;
            $oneArticle->description = $description;
            $oneArticle->price = $price;
            $oneArticle->quantity = $quantity;
            $oneArticle->discount = $discount;
            $oneArticle->itemTax = $itemTax;
            $oneArticle->idinvoice =$invoice->id ;
            $oneArticle->save();
        }



    }

}
