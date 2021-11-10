<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    use HasFactory;
    protected $table='firms';
    public $email;
    public $id;

    public function registred()
    {
        return $this->hasOne(Registred::class, 'idfirm');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'idfirm');
    }

    public function show(){
     return  $this->all()->where('id', $this->id );
    }


}
