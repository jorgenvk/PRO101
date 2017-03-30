<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // ::: Navn på tabell i DB
    protected $table = 'Kategori';


    //Forholdet mellom databasene. En kategori har mange bedrifter.
    public function bedrifter() {
    	$this->hasMany('App\Bedrift');
    }
    
}
