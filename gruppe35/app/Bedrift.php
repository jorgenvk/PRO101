<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedrift extends Model
{
    // ::: Navn på tabell i DB
    protected $table = 'Bedrifter';

    // Forholdet mellom databasene. En bedrift har en kategori
    public function kategori() {
    	$this->hasOne('App\Kategori');
    }

}
