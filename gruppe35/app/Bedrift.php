<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedrift extends Model
{
    // ::: Navn på tabell i DB
    protected $table = 'Bedrifter';

    // Forholdet mellom databasene. En bedrift har en kategori
    public function kategori() {
    	return $this->hasOne('App\Kategori', 'id', 'Kategori_id');
    }

    public function bilder()
    {
    	return $this->hasMany('App\Bilde', 'bedrift_id', 'id');
    }

    public function kommentarer()
    {
      return $this->hasMany('App\Kommentar');
    }

    public function arrangementer()
    {
      return $this->hasMany('App\Arrangement', 'sted', 'id');
    }
}
