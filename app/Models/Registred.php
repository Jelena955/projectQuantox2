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


        return $this->join('firms', 'firms.id', '=', 'registreds.idfirm')->where(['password'=>$this->passwordlog,'mail'=>$this->email] )->get();

  }

}
