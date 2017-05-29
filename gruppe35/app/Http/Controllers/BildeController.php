<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Bilde;
use App\Bedrift;
use Storage;
use Image;


class BildeController extends Controller
{
    public function upload (Request $request)
    {
    	if ($request->hasFile('fil'))
    		{
                // Rotere bilder (fra mobil)
                $filepath = $request->file('fil')->getPathName();
                $filepath = $filepath.'/'.$request->file('fil')->getClientOriginalName();
                $file = $request->file('fil');
                $bilde = Image::make($file);
                $bilde->orientate();
                $tmp_bildenavn = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.'.$file->getClientOriginalExtension();
                $bilde->save(public_path($tmp_bildenavn));
                $lagret_bildenavn = $bilde->dirname.'/'.$bilde->basename;

    			if ($s3upload = Storage::disk('s3')->putFile('', new File($lagret_bildenavn), 'public'))
    				{
                        // Slett midlertidige variabler
                        $bilde->destroy();
                        // Oppretter bildet
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
