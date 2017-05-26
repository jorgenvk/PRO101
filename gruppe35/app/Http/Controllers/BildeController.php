<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bilde;
use App\Bedrift;
use Storage;

class BildeController extends Controller
{
    public function upload (Request $request)
    {
    	if ($request->hasFile('fil'))
    		{
    			if ($s3upload = Storage::disk('s3')->putFile('', $request->file('fil'), 'public'))
    				{
                        $bilde = New Bilde;
                        $bilde->bilde = $s3upload;
                        $bilde->Bedrift_id = $request->Bedrift_id;
                        $bilde->save();

                        return redirect()->back()->with('status_ok', '<strong>Bilde lastet opp!</strong><br>Gratulerer - bildet ditt fra bedriften er nå på nettet! :)');
                    }
    			else
    				{return redirect()->back()->withInput()->withErrors("Feil ved opplasting av bilde til server. Prøv igjen!");}
    		}
    	else
    		{return redirect()->back()->withInput()->withErrors("Feil ved opplasting: finner ingen vedlagt fil!");}
    }

}
