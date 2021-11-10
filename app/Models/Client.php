<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Firm
{
    use HasFactory;
    protected $table='clients';

    public function firm()
    {
        return $this->belongsTo(Firm::class,'idfirm');
    }

    public function registredfirm()
    {
        return $this->belongsTo(Registred::class, 'idregistred');
    }


}
