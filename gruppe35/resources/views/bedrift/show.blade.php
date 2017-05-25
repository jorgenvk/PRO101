@extends('layout.master')

@section('tittel', "$bedrift->Bedrift_navn")

@section('body')

  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="jumbotron">
        <h1> {{ $bedrift->Bedrift_navn }}</h1>
        <img src="{{ $bedrift->Bilde }}" class="bedriftbilde"/>
        <p> {{ $bedrift->Beskrivelse }} </p>
        <table class="table">
          <thead>
          <tr>
            <th>Kategori:</th>
            <th>Adresse:</th>
            <th>Telefon:</th>
            <th>Åpningstider:</th>
            <th>Nettside:</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $bedrift->kategori->Kategori_navn }}</td>
              <td>{{ $bedrift->Adresse }}</td>
              <td>{{ $bedrift->Telefon }}</td>
              <td>{{ $bedrift->Åpningstider }}</td>
              <td><a href="http://{{ $bedrift->Nettside }}">{{ $bedrift->Nettside }}</a></td>
            </tr>
          </tbody>
        </table>
        <div class="kart">
          <h2>Finn {{ $bedrift->Bedrift_navn }} her!</h2>
          <iframe
            id="kartBedrift"
            width="800"
            height="450"
            frameborder="0" style="border:0"
            src="https://www.google.com/maps/embed/v1/search?key=AIzaSyDywUZI16jpELxuAZ6VFnNtaGyElz-DQ-k&q={{$bedrift->Bedrift_navn}},{{$bedrift->Adresse}}" allowfullscreen>
          </iframe>
        </div>
      </div>
    </div>
  </div>
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


  <script>
  $(function () {
    $("#fil").on("change", function(){
      $('form#formBilderUpload').submit();
    });
    });
  </script>
@endsection
