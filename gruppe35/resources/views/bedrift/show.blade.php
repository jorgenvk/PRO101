@extends('layout.master')

@section('tittel', "$bedrift->Bedrift_navn")

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
            <img src="{{ $bedrift->Bilde }}" class="bedriftbilde"/>
        </div>
        <div class="col-md-6 info-text">
          <ul>
            <li>Kategori: {{ $bedrift->kategori->Kategori_navn }}</li>
            <li>Adresse: {{ $bedrift->Adresse }}</li>
            <li>Telefon: {{ $bedrift->Telefon }}</li>
            <li>Åpningstider: {{ $bedrift->Åpningstider }}</li>
            <li>Nettside: {{ $bedrift->Nettside }}</li>
          </ul>
        </div>
  </div>
          <p> {{ $bedrift->Beskrivelse }} </p>
  <div class="row">
    <div class="col-md-12">
      <h1>Last opp ditt eget bilde her!</h1>
      <hr>
      <div class="col-sm-2 lastoppboks">

      <form action="{{ url('bilder/upload') }}" method="POST" enctype="multipart/form-data" name="formBilderUpload" id="formBilderUpload">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="Bedrift_id" value="{{ $bedrift->id }}">
        <label class="btn btn-info pull-right" for="fil" style="margin-left: 10px;">
        <input id="fil" name="fil" type="file" style="display: none;"/>
        <span class="glyphicon glyphicon-camera"></span>
        </label>
      </form>
      </div>

      @foreach ($bedrift->bilder()->orderBy('created_at', 'desc')->get() as $bilde)
          <div class="col-sm-2 bildeboks">
            <img src="{{ Storage::disk('s3')->url($bilde->bilde) }}" class="img-responsive">
          </div>
      @endforeach

      </div>
  </div><!-- ..row -->
<div class="row">
  <div id="kommentarskjema" class="col-md-8 col-md-offset-2">
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
          <textarea name="kommentar" class="form-control"></textarea>

          <input type="submit" value="Legg til kommentar" class="btn btn-success btn-block" />
        </div>
      </div>

    </form>
  </div>

</div>
<div class="row">

<div class="col-md-8 col-md-offset-2">
  <h1>Kommentarer</h1>
  @foreach($bedrift->kommentarer as $kommentar)
    <div class="kommentar">
      <p><b>Navn:</b> {{ $kommentar->navn }}</p>
      <p><b>Epost:</b> {{ $kommentar->epost }}</p>
      <p><b>Kommentar:</b> <br />{{ $kommentar->kommentar }}</p><br /><br />
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
@endsection
