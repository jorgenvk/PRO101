<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kommentar;
use App\Bedrift;


class KommentarController extends Controller
{

  public function lagre(Request $request, $bedrift_id)
  {

    $bedrift = Bedrift::find($bedrift_id);

    $kommentar = new Kommentar;

    $kommentar->navn =  $request->navn;
    $kommentar->epost = $request->epost;
    $kommentar->kommentar = $request->kommentar;
    $kommentar->bedrift()->associate($bedrift);

    $kommentar->save();

    return redirect('bedrift/show/'.$bedrift->id);
  }

}
