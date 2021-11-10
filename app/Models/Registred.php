<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Registred extends Firm
{

    use HasFactory;
    protected $table='registreds';
    public $passwordlog;



    public function firm()
    {
        return $this->belongsTo(Firm::class, 'idfirm');
    }

  public function login(){


        return $this->join('firms', 'registreds.idfirm', '=', 'firms.id')->select('registreds.id as idregistred', 'firms.name as name', 'firms.pib as pib', 'firms.adress', 'firms.accountnumber', 'firms.mail', 'firms.id', 'firms.idnumber')->where(['password'=>$this->passwordlog,'mail'=>$this->email] )->get();

  }

    public function clientfirm()
    {
        return $this->hasMany(Client::class, 'idregitred');
    }


}
