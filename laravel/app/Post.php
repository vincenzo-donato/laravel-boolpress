<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // CREO LE FILLABLE CON I DATI RICHIESTI 
    protected $fillable = ['name','slug','description','cover'];

    // COLLEGAMENTO FRA I POST E USER UN USER A MOLTI POST
    public function user(){
        return $this->belongsTo('App\User');
    }

    // COLLEGAMENTO FRA POST E TAG MOLTI A MOLTI  
    public function tags(){
        return  $this->belongsToMany('App\Tag');
    }
}
