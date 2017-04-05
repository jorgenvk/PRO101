<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bedrift;
use App\Kategori;

class BedriftController extends Controller
{

    public function pageLeggTilBedrift()
    {
    	// Henter alle kategorier;
    	$kategorier = Kategori::all();

    	return view ('bedrift.ny', compact('kategorier'));
    }

        public function listBedrifter() 
    {

    	$bedrifter = Bedrift::all();

        $kategorier = Kategori::all();



    	return view ('bedrift.list', compact('bedrifter', 'kategorier'));
    }

    public function postNyBedrift(Request $request)
    {
    	// TO-DO legge til Validator, sørge for at form-data er gyldig, osv..

        if ($request->hasFile('fil-profilbilde'))
            {
                if ($s3upload = Storage::disk('s3')->putFile('bedrift-profil', $request->file('fil-profilbilde'), 'public'))
                    {
                        // Profilbildet *ble* laset opp, opprett bedrift;
                        $bedrift = New Bedrift;
                        $bedrift->Bedrift_navn  = $request->Navn;
                        $bedrift->Kategori_id   = $request->Kategori;
                        $bedrift->Adresse       = $request->Adresse;
                        $bedrift->Telefon       = $request->Telefon;
                        $bedrift->Beskrivelse   = $request->Beskrivelse;
                        $bedrift->Åpningstider  = $request->Åpningstider;
                        $bedrift->Nettside      = $request->Nettside;
                        $bedrift->Bilde         = $s3upload;

                        $bedrift->save();                        
                    }
                else
                    {
                        // Profilbildet ble ikke lastet opp
                        return "Feil ved opplasting av bilde til server :-(";
                    }
            }
        else
            {
                // Mangler bilde!
                return "Men kjære deg... du må laste opp et bilde av bedriften din!";
            }

        //Tilbakemelding på at bedrift ble lagt til?
		return redirect()->back();
    }

}
