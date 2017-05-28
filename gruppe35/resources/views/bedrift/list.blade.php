@extends('layout.master')
@include('footer')
@section('tittel', 'Bedrifter')

@include('layout.header')

@section('body')
<div class="row">
  <div class="filter col-md-6 col-md-offset-3">
    <h3>Sorterer {{ ($filter == 'Alfabetisk') ? "i alfabetisk rekkefølge" : "etter avstand fra Campus ".$filter }}</h3>
    <a href="{{ url('bedrift/list', [$kategori, 'Alfabetisk']) }}"class="btn btn-primary btn-sm">Alfabetisk rekkefølge</a>
    <a href="{{ url('bedrift/list', [$kategori, 'Fjerdingen']) }}" class="btn btn-primary btn-sm">Avstand fra Campus Fjerdingen</a>
    <a href="{{ url('bedrift/list', [$kategori, 'Vulkan']) }}" class="btn btn-primary btn-sm">Avstand fra Campus Vulkan</a>
  </div>
</div>


<div class="row">
    @foreach($bedrifter as $bedrift)
      <div class="col-md-3 bedriftdiv">
        <a href="{{ url('bedrift/show/'.$bedrift->id) }}">
          <img class="bedrift_thumbnail" src="{{ $bedrift->Bilde }}"/>
          <p class="overlay">Avstand til Fjerdingen: {{ $bedrift->avstand_fjerdingen }}m</p>
          <p class="overlay vulkan">Avstand til Vulkan: {{ $bedrift->avstand_vulkan }}m</p>
        <h2>{{ $bedrift->Bedrift_navn }}</a></h2>
        <p>{{ substr($bedrift->Beskrivelse, 0, 100) }}{{ strlen($bedrift->Beskrivelse) > 100 ? "..." : "" }}</p>
        <p></p>
      </div>
    @endforeach

</div>

@endsection
