@extends('layout.master')
@include('footer')
@section('tittel') Registrer ny bedrift @stop

@include('layout.header')

@section('body')

  <div class="jumbotron col-lg-10 col-lg-offset-1" style="background-color: #3C373A">
    <h1>Legg til ny bedrift i databasen</h1>
    <p class="lead">Her kan man legge til ny bedrift i DB.</p>
  </div>
   
  <div class="row">

    <div class="col-lg-5 col-lg-offset-1">
        <h4>Informasjon - Ny bedrift</h4>
        <div class="input-group" style="width: 90%">
                <form method="POST" enctype="multipart/form-data" name="formNyBedrift" id="formNyBedrift" action="{{ url('bedrift/lagre') }}">
                    {{ csrf_field() }}
                    Bedriftens profilbilde:
                    <input type="file" id="fil" name="fil">
                    Bedriftens navn: <input type="text" class="form-control" name="Navn" id="Navn" /><br>
                    Adresse: <input type="text" class="form-control" name="Adresse" id="Adresse" /><br>
                    Kategori: <select class="form-control" name="Kategori" id="Kategori">
        
                            <!-- Itererer over alle kategoriene hentet fra DB -->
                            @foreach ($kategorier as $kategori)
                                <option value="{{ $kategori->id }}"> {{ $kategori->Kategori_navn }}</option>
                            @endforeach

                    </select><br>
                    Telefonnummer: <input type="text" class="form-control" name="Telefon" id="Telefon" /><br>
                    Beskrivelse: <textarea rows="5" class="form-control" name="Beskrivelse" id="Beskrivelse"></textarea><br>
                    Åpningstider: <input type="text" class="form-control" name="Åpningstider" id="Åpningstider" /><br>
                    Nettside: <input type="text" class="form-control" name="Nettside" id="Nettside" /><br>
                    <input type="submit" class="btn btn-info pull-right" style="margin-top: 10px;" value="Registrer bedrift">
                  </form>
          </div>            
    </div>

    <div class="col-lg-6">
      <h4>Lokasjon - Google Maps</h4>
      <p>Din lokasjon vil oppdateres når du skriver inn adressen.</p>
      <iframe
        id="kartNyBedrift"
        width="600"
        height="450"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/search?key=AIzaSyDywUZI16jpELxuAZ6VFnNtaGyElz-DQ-k&q=Westerdals, Oslo" allowfullscreen>
      </iframe>
    </div>         
  </div>

<!-- Forsøk på dynamisk oppdatering av adresse i kartet -->
<script  type="text/javascript">
$(document).ready(function(){

    $('#Adresse').on('change', function() {
      var bed_navn = $('#Navn').val()
      var bed_adr = $('#Adresse').val()
      if (bed_adr == "" || bed_adr.length < 2 || bed_adr == null)
        {
           bed_adr = "Oslo"
        }
      var q = bed_navn + ', ' + bed_adr;
      $('#kartNyBedrift').attr('src','https://www.google.com/maps/embed/v1/search?key=AIzaSyDywUZI16jpELxuAZ6VFnNtaGyElz-DQ-k&q='+q);
    });

});
</script>

@stop