<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // ::: Navn på tabell i DB
    protected $table = 'Kategori';
<<<<<<< HEAD


    //Forholdet mellom databasene. En kategori har mange bedrifter.
    public function bedrifter() {
    	$this->hasMany('App\Bedrift');
    }
=======
    public $timestamps = false;
>>>>>>> 26ce403e0f27b9fd993a13b1a681d6c1eae2ae0e
    
}
