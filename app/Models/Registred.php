<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registred extends Model
{
    use HasFactory;
    protected $table='registreds';
    public $passwordlog;

    public function firm()
    {
        return $this->belongsTo(Firm::class, 'idfirm');
    }



}
