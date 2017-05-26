<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arrangement;
use App\Bedrift;
use \Carbon\Carbon;
use Validator;
use Storage;

class ArrangementController extends Controller
{
    //

    public function pageNyttArrangement()
    {
    	$bedrifter = Bedrift::all();
    	return view ('arrangement.ny', compact('bedrifter'));
    }

    public function lagre(Request $request)
    {
        if ($request->hasFile('Profilbilde'))
        {
        $validator = Validator::make($request->input(),
            [
                'Tittel'                    => 'required:max:250',
                'Sted'                      => 'required',
                'Tidspunkt_start'           => 'required',
                'Tidspunkt_start'           => 'required',
            ],
            [
                'Tittel.required'                   => 'Arrangementet må ha en tittel!',
                'Tittel.max'                        => 'Tittelen til arrangementet er for lang (max 250 tegn)!',
                'Sted.required'                     => 'Arrangementet må ha et angitt sted!',               
                'Tidspunkt_start.required'          =>  'Arrangementet må ha et starttidspunkt!',
                'Tidspunkt_slutt.required'          =>  'Arrangmentet må ha et slutttidspunkt!',
            ]);

        if($validator->passes())
            {
                // Laster opp profilbildet
                $s3upload = Storage::disk('s3')->putFile('', $request->file('Profilbilde'), 'public');

                // Konverterer tidspunkter til Carbon
                $starts_at = New Carbon($request->Tidspunkt_start);
                $ends_at = New Carbon($request->Tidspunkt_slutt);

                // Oppretter arrangementet
                $arrangement = New Arrangement;
                $arrangement->tittel = $request->Tittel;
                $arrangement->sted = $request->Sted;
                $arrangement->starts_at = $starts_at;
                $arrangement->ends_at = $ends_at;
                $arrangement->beskrivelse = $request->Beskrivelse;
                $arrangement->bilde = $s3upload;
                $arrangement->save();

                return redirect('bedrift/show/'.$request->Sted)->with('status_ok', '<strong>Arrangementet er opprettet</strong><br>Du har lagt til et nytt arrangement på denne bedriften.');
            }
        else
            {
                return redirect()->back()->withInput()->withErrors($validator);
             }
        }
        else
        {
            return redirect()->back()->withInput()->withErrors("Du må legge ved et profilbilde av bedriften!");
        }
    }
}
