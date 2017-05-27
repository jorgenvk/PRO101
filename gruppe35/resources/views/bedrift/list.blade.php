@extends('layout.master')
@include('footer')
@section('tittel', 'Bedrifter')

@include('layout.header')

@section('body')

<div class="row">
       @foreach($bedrifter as $bedrift)
         <div class="col-md-2 bedriftdiv">
           <a href="{{ url('bedrift/show/'.$bedrift->id) }}">
             <img class="bedrift_thumbnail" src="{{ $bedrift->Bilde }}"/>
           <h2>{{ $bedrift->Bedrift_navn }}</a></h2>
           <p>{{ substr($bedrift->Beskrivelse, 0, 100) }}{{ strlen($bedrift->Beskrivelse) > 100 ? "..." : "" }}</p>
           <p></p>
         </div>
       @endforeach
  </div>
  </div>
</div>

@endsection
