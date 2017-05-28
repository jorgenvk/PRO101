@extends('layout.master')
@include('layout.header')
@section('tittel', 'FORSIDE')

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

  .kategorier img{
    width: 130px;
  }
</style>
@stop
<div class="container">
@section('body')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2><span class="glyphicon glyphicon-calendar"></span> Hva skjer?</h2>
      @foreach ($arrangementer as $arrangement)
        {{ $arrangement->tittel }}
      @endforeach
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2><span class="glyphicon glyphicon-camera"></span> Siste knips!</h2>
      @foreach ($bilder as $bilde)
        <div class="col-sm-2 bildeboks">
          <a href="{{ $bilde->bedrift->id }}">
            <img src="{{ Storage::disk('s3')->url($bilde->bilde) }}" class="img-responsive">
          </a>
        </div>
      @endforeach
    </div>
  </div>  
@endsection
</div>
