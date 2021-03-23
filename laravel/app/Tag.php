<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // CREO FILLABLE PER I DATI RICHIESTI 
    protected $fillable = ['name','slug'];

    // CREO COLLEGAMENTO POST TAG MOLTI A MOLTI 
    public function posts(){
        return  $this->belongsToMany('App\Post');
    }
}
