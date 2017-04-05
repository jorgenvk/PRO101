<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class BildeController extends Controller
{
    public function upload (Request $request)
    {
    	if ($request->hasFile('fil'))
    		{
    			if ($s3upload = Storage::disk('s3')->putFile('', $request->file('fil'), 'public'))
    				{return "Filen er lastet opp i skyen med filnavn ".$s3upload.'!';}
    			else
    				{return "FEIL ved opplasting av fil.";}
    		}
    	else
    		{return "Ingenting?!";}
    }

}
