<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table='invoices';
    public $idinv;

    public function status()
    {
        return $this->belongsTo(Status::class, 'idstatus');
    }
    public function registred()
    {
        return $this->belongsTo(Registred::class, 'idregitred');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'idclient');
    }

    public function show(){
        return  $this->join('registreds', 'invoices.idregitred', '=', 'registreds.id')
           //
           ->join('clients', 'clients.id', '=', 'invoices.idclient')
            ->join('firms', 'firms.id', '=', 'clients.idfirm')
           // ->select('')
            ->where('registreds.id', $this->idinv )->get();
    }
}
