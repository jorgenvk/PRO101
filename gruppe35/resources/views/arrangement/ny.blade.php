@extends('layout.master')
@include('footer')
@section('tittel', 'Registrer nytt arrangement')
@section('header')
<!-- CDN link til datetimepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.css" type="text/css" />
<!-- CDN link til Bootstrap SELECT -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
@stop

@section('body')

  <div class="jumbotron">
    <h1>Registrer nytt arrangement</h1>
    <p class="lead">--</p>
  </div>
   
  <div class="row">

    <div class="col-lg-5">
        <h4>Opprett nytt arrangement</h4>
        <div class="input-group" style="width: 90%">
                <form method="POST" enctype="multipart/form-data" name="formNyttArrangement" id="formNyttArrangement" action="{{ url('arrangement/lagre') }}">
                    {{ csrf_field() }}
                    Sted: <select id="Sted" name="Sted" class="selectpicker" data-live-search="true" data-width="100%">
                      @foreach ($bedrifter as $bedrift)
                          <option value="{{ $bedrift->id }}" id="Sted_valg" name="Sted_valg">{{ $bedrift->Bedrift_navn }}, {{ $bedrift->Adresse }}</option>
                      @endforeach
                    </select><br><br>

                    Profilbilde:
                    <input type="file" id="Profilbilde" name="Profilbilde">

                    <br>

                    Arrangement tittel: <input type="text" class="form-control" name="Tittel" id="Tittel" /><br>
                    <br>
                    Tidspunkt:
                    <div class='input-group date'>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span> Starter
                        </span>
                        <input id="datetimepicker-start" name="Tidspunkt_start" type="text" class="form-control">                    
                    </div>
                    <div class='input-group date'>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span> Slutter
                        </span>
                        <input id="datetimepicker-slutt" name="Tidspunkt_slutt" type="text" class="form-control">    
                    </div>
                    Beskrivelse: <textarea rows="5" class="form-control" name="Beskrivelse" id="Beskrivelse" style="resize: vertical;"></textarea><br>                    
                    <input type="submit" class="btn btn-info pull-right" style="margin-top: 10px;" value="Legg til arrangement">
                  </form>
          </div>
    </div>

    <div class="col-lg-7">
      <h4>Arrangement - Sted</h4>

      <iframe
        id="kartNyttarrangement"
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

    $('#Sted').on('change', function() {
      var arrangement_sted = $("#Sted option:selected").text()
      if (arrangement_sted == "" || arrangement_sted.length < 2 || arrangement_sted == null)
        {
           arrangement_sted = "Westerdals, Oslo"
        }
      $('#kartNyttarrangement').attr('src','https://www.google.com/maps/embed/v1/search?key=AIzaSyDywUZI16jpELxuAZ6VFnNtaGyElz-DQ-k&q='+arrangement_sted+" in Oslo");

    });
});
jQuery('#datetimepicker-start').datetimepicker();
jQuery('#datetimepicker-slutt').datetimepicker();
</script>

@stop