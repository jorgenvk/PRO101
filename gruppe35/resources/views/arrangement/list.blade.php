@extends('layout.master')
@section('tittel', 'Arrangementer - Westfinder')

@section('body')

<div class="row">
       @foreach($arrangementer as $arrangement)
         <div class="col-md-3 bedriftdiv">
           <a href="{{ url('arrangement/show/'.$arrangement->id) }}">
             <img class="bedrift_thumbnail" src="{{ Storage::disk('s3')->url($arrangement->bilde) }}"/>
           <h2>{{ $arrangement->tittel }}</a></h2>
           <p>{{ substr($arrangement->beskrivelse, 0, 100) }}{{ strlen($arrangement->beskrivelse) > 100 ? "..." : "" }}</p>
           <p></p>
         </div>
       @endforeach
</div>

@endsection
