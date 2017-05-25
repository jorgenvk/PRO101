<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kommentar extends Model
{
    protected $table = 'kommentarer';

    public function bedrift()
    {
      return $this->belongsTo('App\Bedrift');
    }
}
