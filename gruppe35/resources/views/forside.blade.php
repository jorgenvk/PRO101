@extends('layout.master')
@include('layout.header')
@section('tittel', 'Forside - Westfinder')
@section('header')
<style>
body{
  position: absolute;
  background-size: cover;
  background-image: url("/bilder/forside.jpg");
  display: block;
  height: 100%;
  width: 100%;
  left: 0;
  right: 0;
  z-index: 1;
  }
</style>
@stop
@section('body')
<div class="container">
  <div class="row">
    <div class="col-md-12 forside">
      <h2><img src="{{ url('ikoner/Bedrift_Ikon.png') }}" width="50px"> Hva skjer?</h2>
       @foreach($arrangementer as $arrangement)
         <div class="col-md-3">
           <a href="{{ url('arrangement/show/'.$arrangement->id) }}">
             <img class="img-responsive" src="{{ Storage::disk('s3')->url($arrangement->bilde) }}"/>
           <h2>{{ $arrangement->tittel }}</a></h2>
           <p>{{ substr($arrangement->beskrivelse, 0, 100) }}{{ strlen($arrangement->beskrivelse) > 100 ? "..." : "" }}</p>
           <p></p>
         </div>
       @endforeach
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 forside">
      <h2><img src="{{ url('ikoner/Kamera_Ikon.png') }}" width="50px"> Siste bilder</h2>
       @foreach ($bilder as $bilde)
         <div class="col-md-2">
             <img onclick="onClick(this)" src="{{ Storage::disk('s3')->url($bilde->bilde) }}" class="img-responsive">
         </div>
       @endforeach
    </div>
  </div>

    <div id="popup-vindu" class="bilde-ramme">
      <span class="close" onclick="document.getElementById('popup-vindu').style.display='none'">&times;</span>
      <img class="bilde" id="stort-bilde">
    </div>  

</div>
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
