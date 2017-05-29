@extends('layout.master')

@section('tittel') Alle arrangementer - Westfinder @stop

<style>
    body{
        text-align: center;
    }

</style>

@section('body')
<div class="row">
  <div class="col-md-3">
    <h3 class="text-left">Arrangementer:</h3>
  </div>
</div>


<div class="row">
    @foreach($arrangementer as $arrangement)
      <div class="col-md-3 bedriftdiv">
        <div class="img-frame">
          <a href="{{ url('arrangement/show/'.$arrangement->id) }}">
            <img class="img-responsive" src="{{ Storage::disk('s3')->url($arrangement->bilde) }}"/>
        </div>

          <p class="overlay">Avstand til Fjerdingen: {{ $arrangement->bedrift->avstand_fjerdingen }}m</p>
          <p class="overlay vulkan">Avstand til Vulkan: {{ $arrangement->bedrift->avstand_vulkan }}m</p>
        <h2>{{ $arrangement->tittel }}</a></h2>
        <p>{{ substr($arrangement->beskrivelse, 0, 100) }}{{ strlen($arrangement->beskrivelse) > 100 ? "..." : "" }}</p>
        <p></p>
      </div>
    @endforeach

</div>

@endsection
