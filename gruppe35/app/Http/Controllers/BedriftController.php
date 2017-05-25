<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bedrift;
use App\Kategori;
use App\Ratings;
use App\Bilder;
use Storage;

class BedriftController extends Controller
{

    public function pageNyBedrift()
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
    	// TO-DO legge til Validator, sørge for at form-data er gyldig, osv.
        if ($request->hasFile('fil'))
            {
                if ($s3upload = Storage::disk('s3')->putFile('', $request->file('fil'), 'public'))
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
                        $bedrift->Bilde         = Storage::disk('s3')->url($s3upload);

                        $bedrift->save();
                    }
                else
                    {
                        // Profilbildet ble IKKE lastet opp
                        return redirect()->back()->withInput()->withErrors("Feil ved opplasting av bilde til server. Prøv igjen!");
                    }
            }
        else
            {
                // Mangler bilde!
                return redirect()->back()->withInput()->withErrors("Du glemte å legge ved bilde. Det kan skje den beste. Prøv igjen!");
            }

        // Alt OK
		return redirect()->back()->with('status_ok', '<strong>Bedrift opprettet!</strong><br>Gratulerer. Ny bedrift er lagt til.!');
    }

    public function show($id)
    {
      $bedrift = Bedrift::find($id);

      return view('bedrift.show')->with('bedrift', $bedrift);
    }


    // Sorteringsfunksjon. sorterer på kategori
    public function sort($filter)
    {
        if($filter == 'Uteliv') {
            $bedrifter = Bedrift::where('Kategori_id', '=', '1')->get();
        }
        else if($filter == 'Butikker') {
            $bedrifter = Bedrift::where('Kategori_id', '=', '2')->get();
        }
        else if($filter == 'Kollektiv') {
            $bedrifter = Bedrift::where('Kategori_id', '=', '3')->get();
        }
        else if($filter == 'Helse') {
            $bedrifter = Bedrift::where('Kategori_id', '=', '4')->get();
        }
        else if($filter == 'Trening') {
            $bedrifter = Bedrift::where('Kategori_id', '=', '5')->get();
        }

        $kategorier = Kategori::all();

        return view ('bedrift.list', compact('bedrifter', 'kategorier'));
    }

    public function search(Request $request)
    {

          $kategorier = Kategori::all();

            $keyword = $request->keyword;

            $bedrifter = Bedrift::where('Bedrift_navn', 'LIKE', '%'.$keyword.'%')
           ->orWhere('Adresse', 'LIKE', '%'.$keyword.'%')
           ->orWhere('Beskrivelse', 'LIKE', '%'.$keyword.'%')
           ->get();


         return view('bedrift.list', compact('bedrifter', 'kategorier'));
    }

    public function admin()
    {

        $bedrifter = Bedrift::all();

        $kategorier = Kategori::all();



        return view ('bedrift.adminlist', compact('bedrifter', 'kategorier'));
    }

    public function delete($id)
    {
        Bilder::where('Bedrift_id', $id)->delete();
        Ratings::where('bedriftid', $id)->delete();
        Bedrift::where('id', $id)->delete();

        return redirect()->back();
    }

    public function rating($id){
        $avgrating = Ratings::where('bedriftid', $id)->get()->AVG('score'); //test

        return $avgrating;
    }

    public function rate($id, $score){
        Ratings::insert(
            [
                'bedriftid' => $id,
                'score' => $score
            ]
        );
    }

}
