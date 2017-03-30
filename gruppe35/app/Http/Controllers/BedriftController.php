<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bedrift;
use App\Kategori;

class BedriftController extends Controller
{
    public function pageNyBedrift()
    {
    	//
    	$kategorier = Kategori::all();

    	return view ('bedrift.ny', compact('kategorier'));
    }


    public function listBedrifter() 
    {

    	$bedrifter = Bedrift::all();



    	return view ('bedrift.list', compact('bedrifter'));
    }
}
