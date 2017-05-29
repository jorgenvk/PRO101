@extends('layout.master')
@section('tittel') Rediger arrangement - Westfinder @stop
@section('header')
<!-- CDN link til datetimepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.css" type="text/css" />
<!-- CDN link til Bootstrap SELECT -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
@stop

@include('layout.header')

@section('body')

  <div class="jumbotron col-lg-10 col-lg-offset-1" style="background-color: #3C373A">
    <h1>Endre arrangement</h1>
    <p class="lead">Her kan man endre et arrangement</p>
  </div>

  <div class="row">

    <div class="col-lg-5 col-lg-offset-1">
        <h4>Informasjon - arrangement</h4>
        <div class="input-group" style="width: 90%">
                <form method="POST" enctype="multipart/form-data" name="formEditArrangement" id="formEditArrangement" action="{{ url('arrangement/update', $arrangement->id) }}">
                    {{ csrf_field() }}
                    Arrangement tittel: <input type="text" class="form-control" name="Tittel" id="Tittel" value="{{ $arrangement->tittel }}"/><br>
                    Sted: <select id="Sted" name="Sted" class="selectpicker" data-live-search="true" data-width="100%">
                      @foreach ($bedrifter as $bedrift)
                          <option value="{{ $bedrift->id }}" id="Sted_valg" name="Sted_valg">{{ $bedrift->Bedrift_navn }}, {{ $bedrift->Adresse }}</option>
                      @endforeach
                    </select><br><br>
                    Tidspunkt:
                    <div class='input-group date'>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span> Starter
                        </span>
                        <input id="datetimepicker-start" name="Tidspunkt_start" type="text" class="form-control" value="{{$arrangement->starts_at}}">                    
                    </div>
                    <div class='input-group date'>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span> Slutter
                        </span>
                        <input id="datetimepicker-slutt" name="Tidspunkt_slutt" type="text" class="form-control" value="{{$arrangement->ends_at}}">    
                    </div>
                    Beskrivelse: <textarea rows="5" class="form-control" name="Beskrivelse" id="Beskrivelse" style="resize: vertical;">{{$arrangement->beskrivelse}}</textarea><br>                    
                    <input type="submit" class="btn btn-info pull-right" style="margin-top: 10px;" value="Endre arrangement">
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
        src="https://www.google.com/maps/embed/v1/search?key=AIzaSyDywUZI16jpELxuAZ6VFnNtaGyElz-DQ-k&q={{$arrangement->bedrift->Bedrift_navn}},{{$arrangement->bedrift->Adresse}}" allowfullscreen>
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