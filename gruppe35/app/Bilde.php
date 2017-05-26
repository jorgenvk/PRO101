<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bilde extends Model
{
    //
    protected $table = 'Bilde';

    public function bedrift ()
    {
    	return $this->hasOne('App\Bedrift', 'id', 'bedrift_id');
    }    

}
