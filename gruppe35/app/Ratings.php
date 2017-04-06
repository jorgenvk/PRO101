<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    //
    protected $table = 'Ratings';


    //Forholdet mellom databasene. En kategori har mange bedrifter.
    public function bedrifter() {
    	return $this->hasOne('App\Bedrift');
    }
    public $timestamps = false;
}
