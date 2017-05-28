@extends('layout.master')
@section('tittel', 'Bedrifter')



@section('body')

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
