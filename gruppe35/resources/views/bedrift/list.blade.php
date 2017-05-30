@extends('layout.master')

@section('tittel') {{$kategori}} - Westfinder @stop

<style>
    body{
        text-align: center;
    }
</style>

@section('body')
<div class="row">
  <div class="col-md-3">
    <h3 class="text-left">Kategori: <img src="{{ url('/ikoner/'.$kategori.'.png')}}" width="50px"/> {{ $kategori }}</h3>
  </div>
  <div class="filter col-md-6">
    <h3>Sorterer {{ ($filter == 'Alfabetisk') ? "i alfabetisk rekkefølge" : "etter avstand fra Campus ".$filter }}</h3>
    <a href="{{ url('bedrift/list', [$kategori, 'Alfabetisk']) }}"class="btn btn-primary btn-sm">Alfabetisk rekkefølge</a>
    <a href="{{ url('bedrift/list', [$kategori, 'Fjerdingen']) }}" class="btn btn-primary btn-sm">Avstand fra Campus Fjerdingen</a>
    <a href="{{ url('bedrift/list', [$kategori, 'Vulkan']) }}" class="btn btn-primary btn-sm">Avstand fra Campus Vulkan</a>
  </div>
  <div class="col-md-3">

  </div>
</div>


<div class="row">
    @foreach($bedrifter as $bedrift)
      <div class="col-md-3 bedriftdiv">
        <div class="img-frame">
          <a href="{{ url('bedrift/show/'.$bedrift->id) }}">
            <img class="img-responsive" src="{{ $bedrift->Bilde }}"/>
        </div>

          <p class="overlay">Avstand til Fjerdingen: {{ $bedrift->avstand_fjerdingen }}m</p>
          <p class="overlay vulkan">Avstand til Vulkan: {{ $bedrift->avstand_vulkan }}m</p>
        <h2>{{ $bedrift->Bedrift_navn }}</a></h2>
        <p>{{ substr($bedrift->Beskrivelse, 0, 100) }}{{ strlen($bedrift->Beskrivelse) > 100 ? "..." : "" }}</p>
        <p></p>
      </div>
    @endforeach

</div>

@endsection