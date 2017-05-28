<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrangement extends Model
{
    protected $table = 'Arrangement';
    protected $dates = [
        'starts_at',
        'ends_at'
    ];    

    public function bedrift()
    {
    	return $this->hasOne('App\Bedrift', 'id', 'sted');
    }
}
