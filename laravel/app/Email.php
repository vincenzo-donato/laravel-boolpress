<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    // CREO LE FILLABLE CON I DATI RICHIESTI 
    protected $fillable = ['email','oggetto','contenuto'];
}
