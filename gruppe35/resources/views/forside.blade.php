@extends('layout.master')

@section('tittel', 'FORSIDE')

@section('header')
<style>
.bakgrunn {
  background-image: url('http://666a658c624a3c03a6b2-25cda059d975d2f318c03e90bcf17c40.r92.cf1.rackcdn.com/unsplash_527bf56961712_1.JPG');
  background-size: cover;
  display: block;
  filter: blur(5px);
  -webkit-filter: blur(5px);
  height: 800px;
  left: 0;
  position: fixed;
  right: 0;
  z-index: 1;
}
</style>
@stop

@section('body')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">

    <!-- LOGO -->
    <center>
      <img src="{{ url('bilder/logo.png') }}">
    </center>

    <!-- SØKEBOKS -->
      <form method="POST" action="{{ url('bedrift/search') }}" name="search" id="search">
        {{ csrf_field() }}
        <input type="text" name="keyword" id="keyword" class="form-control"/>
        <input type="submit" value="søk" class="form-control"/>
      </form>

    </div>
  </div>

  <div class="row">
  <!-- KATEGORIER -->
    <div class="col-md-8 col-md-offset-2 kategorier">
      <a href="{{ url('bedrift/list') }}">Alle</a>
      @foreach($kategorier as $kategori)
        <a href="{{ url('bedrift/list/'.$kategori->Kategori_navn) }}"><img src="{{ url('icons/'.$kategori->Kategori_navn.'.png') }}">{{ $kategori->Kategori_navn }}</a>
      @endforeach
    </div>
<!--     <div class="row">
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
    </div> -->
  </div>

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
