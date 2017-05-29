<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Bedrift;
use App\Kategori;
use App\Arrangement;
use App\Bilde;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function forside()
    {
    	$bedrifter = Bedrift::all();
        $kategorier = Kategori::all();
        $arrangementer = Arrangement::latest()->take(4)->get();
        $bilder = Bilde::latest()->take(8)->get();

    	return view ('forside', compact('bedrifter', 'kategorier', 'arrangementer', 'bilder'));
    }

    public function omoss(){
        return view ('omoss');
    }

    public function admin()
    {
    	return view ('admin.index');
    }
}
