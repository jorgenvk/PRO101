@extends('layout.master')

@section('tittel', "$arrangement->tittel - Westfinder")
@include('layout.header')
@section('body')

<?php
  \Carbon\Carbon::setLocale('no');
?>

<!-- KART -->
<div class="kart">
  <iframe
    id="kartBedrift"
    height="300"
    frameborder="0" style="border:0"
    src="https://www.google.com/maps/embed/v1/search?key=AIzaSyDywUZI16jpELxuAZ6VFnNtaGyElz-DQ-k&q={{$arrangement->bedrift->Bedrift_navn}},{{$arrangement->bedrift->Adresse}}" allowfullscreen>
  </iframe>
</div>

<!-- BOKS: Arrangement -->
<div class="bedrift col-md-10 col-md-offset-1">
  <div class="row">
        <h1 class="text-center">Arrangement: "{{ $arrangement->tittel }}"</h1>
        <div class="col-md-6">
            <img onclick="onClick(this)" src="{{ Storage::disk('s3')->url($arrangement->bilde) }}" class="bedriftbilde"/>
            <p>{{ $arrangement->beskrivelse }}</p>
        </div>
        <div class="col-md-6 info-text">
          <ul>
            <li><img src="{{ url('ikoner/Kart_Ikon3.png') }}" class="listeikoner" />
              Sted: <a href="{{ url('bedrift/show/'.$arrangement->bedrift->id) }}">{{ $arrangement->bedrift->Bedrift_navn }}, {{ $arrangement->bedrift->Adresse }}</a></li>

            <li><img src="{{ url('ikoner/Kart_Ikon3.png') }}" class="listeikoner" />
              Starter: @if (isset ($arrangement->starts_at)) {{ $arrangement->starts_at->diffForHumans() }} @endif</li>
            <li><img src="{{ url('ikoner/Kart_Ikon3.png') }}" class="listeikoner" />
              Slutter: @if (isset ($arrangement->ends_at)) {{ $arrangement->ends_at->diffForHumans() }} @endif</li>

            <br><br>
            <li><img src="{{ url('ikoner/Campus_Ikon.png') }}" class="listeikoner" />
            {{ $arrangement->bedrift->avstand_fjerdingen }}m / {{ $arrangement->bedrift->minutter_fjerdingen }} min fra Campus Fjerdingen</li>
            <li><img src="{{ url('ikoner/Campus_Ikon.png') }}" class="listeikoner" />
            {{ $arrangement->bedrift->avstand_vulkan }}m / {{ $arrangement->bedrift->minutter_vulkan }} min fra Campus Vulkan</li>
          </ul>
        </div>
  </div>
</div>


@section('script')
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
