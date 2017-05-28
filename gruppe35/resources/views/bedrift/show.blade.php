@extends('layout.master')

@section('tittel', "$bedrift->Bedrift_navn - Westfinder")
@include('layout.header')
@section('body')
<div class="row">
  <div class="kart">
    <iframe
      id="kartBedrift"
      height="300"
      frameborder="0" style="border:0"
      src="https://www.google.com/maps/embed/v1/search?key=AIzaSyDywUZI16jpELxuAZ6VFnNtaGyElz-DQ-k&q={{$bedrift->Bedrift_navn}},{{$bedrift->Adresse}}" allowfullscreen>
    </iframe>
  </div>
</div>
<div class="bedrift col-md-10 col-md-offset-1">
  <div class="row">
        <h1 class="text-center"> {{ $bedrift->Bedrift_navn }}</h1>
        <div class="col-md-6">
            <img onclick="onClick(this)" src="{{ $bedrift->Bilde }}" class="bedriftbilde"/>
            <p>{{ $bedrift->Beskrivelse }}</p>
        </div>
        <div class="col-md-6 info-text">
          <ul>
            <li><img src="{{ url('icons/'.$bedrift->kategori->Kategori_navn.'.png') }}" class="listeikoner" />
              Kategori: {{ $bedrift->kategori->Kategori_navn }}</li>
            <li><img src="{{ url('icons/Kart_Ikon3.png') }}" class="listeikoner" />
              Adresse: {{ $bedrift->Adresse }}</li>
            <li><img src="{{ url('icons/Chat_Ikon.png') }}" class="listeikoner" />
              Telefon: {{ $bedrift->Telefon }}</li>
            <li><img src="{{ url('icons/Info_Ikon.png') }}" class="listeikoner" />
              Åpningstider: {{ $bedrift->Åpningstider }}</li>
            <li><img src="{{ url('icons/Søke_Ikon1.png') }}" class="listeikoner" />
              Nettside: {{ $bedrift->Nettside }}</li>
            <li><img src="{{ url('icons/Campus_Ikon.png') }}" class="listeikoner" />
              {{ $bedrift->avstand_fjerdingen }}m / {{ $bedrift->minutter_fjerdingen }} min fra Campus Fjerdingen</li>
            <li><img src="{{ url('icons/Campus_Ikon.png') }}" class="listeikoner" />
              {{ $bedrift->avstand_vulkan }}m / {{ $bedrift->minutter_vulkan }} min fra Campus Vulkan</li>
              <li><img src="{{ url('icons/Info_Ikon.png') }}" class="listeikoner" />
                  Anmeldelser: {{$rating}}/5</li>
          </ul>
          <div class="col-md-12 bildeopplastning">
            <h3>Last opp ditt eget bilde fra {{ $bedrift->Bedrift_navn }} her!</h3>
            <hr>
            <div class="col-sm-2 lastoppboks">

            <form action="{{ url('bilder/upload') }}" method="POST" enctype="multipart/form-data" name="formBilderUpload" id="formBilderUpload">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="Bedrift_id" value="{{ $bedrift->id }}">
              <input id="fil" name="fil" type="file" style="display: none;"/>
              <label for="fil">
              <img src="{{ url('icons/Kamera_Ikon.png') }}" class="kamera-ikon" />
              </label>

            </form>
            </div>


            @foreach ($bedrift->bilder()->orderBy('created_at', 'desc')->get() as $bilde)
                <div class="col-sm-2 bildeboks">
                  <img onclick="onClick(this)" src="{{ Storage::disk('s3')->url($bilde->bilde) }}" class="liten-thumbnail">
                </div>
            @endforeach

            <div id="popup-vindu" class="bilde-ramme">
              <span class="close" onclick="document.getElementById('popup-vindu').style.display='none'">&times;</span>
              <img class="bilde" id="stort-bilde">
            </div>

        </div>
        </div>
  <div class="row">
<!-- ..row -->
</div>
</div>
</div>
<div class="row">
  <div id="kommentarskjema" class="col-md-8 col-md-offset-2">
    <h3 class="text-center">Legg til en kommentar om {{ $bedrift->Bedrift_navn }} her</h3>
    <form method="POST" action="{{ url('kommentarer', $bedrift->id) }}">
      {{ csrf_field() }}

      <div class="row">
        <div class="col-md-6">
          <label name="navn">Name:</label>
          <input type="text" name="navn" class="form-control" />
        </div>
        <div class="col-md-6">
          <label name="epost">Epost:</label>
          <input type="text" name="epost" class="form-control" />
        </div>
        <div class="col-md-12">
          <label name="kommentar">Kommentar:</label>
          <textarea name="kommentar" class="form-control" rows="5"></textarea>

          <input type="submit" value="Legg til kommentar" class="btn btn-success btn-block" />
        </div>
      </div>

    </form>
  </div>
<div class="row">

<div class="col-md-8 col-md-offset-2">

  <h1 class="text-center">{{ count($bedrift->kommentarer) }} kommentarer</h1>
  @foreach($bedrift->kommentarer as $kommentar)
    <div class="kommentar">
      <div class="col-md-2">
        <img src="{{ url('icons/Chat_Ikon.png') }}" class="kommentar-ikon" />
      </div>
      <p>Fra {{ $kommentar->navn }}, <a href="mailto:{{ $kommentar->epost }}">{{ $kommentar->epost }}</a>
         skrevet {{ date('j M, Y H:i', strtotime($kommentar->created_at)) }}</p>
      <hr />
      <p>{{ $kommentar->kommentar }}</p><br /><br />

    </div>
  @endforeach
</div>
</div>
</div>


  <script>
  $(function () {
    $("#fil").on("change", function(){
      $('form#formBilderUpload').submit();
    });
    });
  </script>
  <script>

  var modal = document.getElementById('popup-vindu');

  var modalImg = document.getElementById("stort-bilde");

  function onClick(element) {
  modalImg.src = element.src;

  modal.style.display = "block";
}

  var span = document.getElementsByClassName("close")[0];

  span.onclick = function() {
    modal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>
@endsection
