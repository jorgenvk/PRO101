<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bedrift;
use App\Kategori;
use App\Ratings;
use App\Bilder;
use Validator;
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
        if ($request->hasFile('fil'))
            {
            $validator = Validator::make($request->input(),
                        [
                            'Navn'              => 'required:max:250',
                            'Adresse'           => 'required:max:250'
                        ],
                        [
                            'Navn.required'     => 'Bedriften må ha et navn!',
                            'Adresse.required'  => 'Bedriften må ha en adresse!',
                            'Navn.max'          => 'Bedriftsnavnet er for langt!',
                            'Adresse.max'       => 'Adressen til bedriften er for lang. Prøv å formater den kortere!',
                        ]);
                if($validator->passes())
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

                                $avstand = self::avstand($request->Navn, $request->Adresse);
                                $bedrift->Avstand_fjerdingen = $avstand[0]; // Avstand Fjerdingen i meter
                                $bedrift->Avstand_vulkan = $avstand[2]; // Avstand Vulkan i meter
                                $bedrift->Minutter_fjerdingen = round($avstand[1]); // Avstand Fjerdingen i tid/minutter
                                $bedrift->Minutter_vulkan = round($avstand[3]); //Avstand Vulkan i tid/minutter

                                $bedrift->rating = self::rating($request->Navn, $request->Adresse); // Google rating

                                $bedrift->save();
                            }
                        else
                            {
                                // Profilbildet ble IKKE lastet opp
                                return redirect()->back()->withInput()->withErrors("Feil ved opplasting av bilde til server. Prøv igjen!");
                            }
                    }
            }
        else
            {
                // Mangler bilde!
                return redirect()->back()->withInput()->withErrors("Du glemte å legge ved bilde. Det kan skje den beste. Prøv igjen!");
            }

        // Alt OK
        return redirect('bedrift/show/'.$bedrift->id)->with('status_ok', '<strong>Bedriften er opprettet</strong><br>Du har lagt til en ny bedrift.');
    }


    public function show($id)
    {
      $bedrift = Bedrift::find($id);
      $avstand = self::avstand($bedrift->Bedrift_navn, $bedrift->Adresse);
      $rating = self::rating($bedrift->Bedrift_navn, $bedrift->Adresse);

      return view('bedrift.show', compact('bedrift', 'avstand', 'rating'));
    }


    // Sorteringsfunksjon. sorterer på kategori
    public function sort($filter)
    {
        if($filter == 'Butikker') {
            $bedrifter = Bedrift::where('Kategori_id', '=', '6')->get();
        }
        else if($filter == 'Uteliv') {
            $bedrifter = Bedrift::where('Kategori_id', '=', '7')->get();
        }
        else if($filter == 'Trening') {
            $bedrifter = Bedrift::where('Kategori_id', '=', '8')->get();
        }
        else if($filter == 'Helse') {
            $bedrifter = Bedrift::where('Kategori_id', '=', '9')->get();
        }
        else if($filter == 'Spisesteder') {
            $bedrifter = Bedrift::where('Kategori_id', '=', '10')
        }
        else if($filter == 'Kollektiv') {
            $bedrifter = Bedrift::where('Kategori_id', '=', '11')->get();
        }
        
        $kategorier = Kategori::all();

        return view ('bedrift.list', compact('bedrifter', 'kategorier'));
    }

    public function search(Request $request)
    {

            $kategorier = Kategori::all();

            $keyword = $request->keyword;

            if($keyword != '') {
            $bedrifter = Bedrift::where('Bedrift_navn', 'LIKE', '%'.$keyword.'%')
           ->orWhere('Adresse', 'LIKE', '%'.$keyword.'%')
           ->orWhere('Beskrivelse', 'LIKE', '%'.$keyword.'%')
           ->orWhere('Telefon', 'LIKE', '%'.$keyword.'%')
           ->orWhere('Nettside', 'LIKE', '%'.$keyword.'%')
           ->get();
         }
            else $bedrifter = Bedrift::all();

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
    public function avstand($bedrift, $adresse){
        $bedrift = urlencode($bedrift);
        $adresse = urlencode($adresse);
        $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=Campus+Fjerdingen|Campus+Vulkan&destinations={{$bedrift}}+{{$adresse}}&mode=walking&language=no-NO&key=AIzaSyAYR9gvYoViYikV9EGw2BAPYzf0CxqBRbU");
        $data = json_decode($data);

        $distance[0] = 0;
        $distance[1] = 0;
        $distance[2] = 0;
        $distance[3] = 0;


        foreach($data->rows[0]->elements as $road) {
            $distance[0] += $road->distance->value;
            $distance[1] += $road->duration->value/60;
        }
        foreach($data->rows[1]->elements as $road) {
            $distance[2] += $road->distance->value;
            $distance[3] += $road->duration->value/60;
        }

        return $distance;
    }

    public function rating($bedrift, $adresse){

        $bedrift = urlencode($bedrift);
        $adresse = urlencode($adresse);
        $data = file_get_contents("https://maps.googleapis.com/maps/api/place/textsearch/json?query={{$bedrift}}+{{$adresse}}&key=AIzaSyAYR9gvYoViYikV9EGw2BAPYzf0CxqBRbU");
        $data = json_decode($data);

        $rating = 0.0;

        foreach($data->results as $place) {
            if($rating <= 0) {
                $rating += $place->rating;
            }
            }

        return $rating;
    }

}
