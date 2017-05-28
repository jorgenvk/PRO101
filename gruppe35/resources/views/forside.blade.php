@extends('layout.master')
@include('layout.header')
@section('tittel', 'Forside - Westfinder')

@section('header')
<style>
body {
  position: absolute;
  background-size: cover;
  background-image: url("https://lh6.googleusercontent.com/WpLju4WpsAcAODXL73nKCgnoBz5AJqrKLKiuPeJmfq6LlmXq5mVTA9XzkvKCetSQtDrHRWtgpWJXn00=w1859-h917-rw");
  display: block;
  height: 100%;
  width: 100%;
  left: 0;
  right: 0;
  z-index: 1;
}
  .bildeboks{
    top: 0;
    padding: 20px;
  }

  .row{
    padding: 5%;
  }

</style>
@stop
<div class="container">
@section('body')

  <div class="row">
    <div class="col-md-8 col-md-offset-0">
      <h2><span class="glyphicon glyphicon-calendar"></span> Hva skjer?</h2>
      @foreach ($arrangementer as $arrangement)
        {{ $arrangement->tittel }}
      @endforeach
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-0">
      <h2><span class="glyphicon glyphicon-camera"></span> Siste knips!</h2>
      @foreach ($bilder as $bilde)
        <div class="col-sm-2 bildeboks">

            <img onclick="onClick(this)" src="{{ Storage::disk('s3')->url($bilde->bilde) }}" class="liten-thumbnail">

        </div>
      @endforeach
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
@endsection
</div>
