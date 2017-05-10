@extends('layout.master')

@section('tittel', 'Bedrifter')

@section('body')
        <div class="row">
          <div class="col-md-8 col-md-offset-3 kategorier">


            <a href="{{ url('bedrift/list') }}">Alle</a>
                     <?php foreach($kategorier as $kategori) { ?>
                           <a href="{{ url('bedrift/list/'.$kategori->Kategori_navn) }}"><img src="{{ url('icons/'.$kategori->Kategori_navn.'.png') }}" width="50px">{{ $kategori->Kategori_navn }}</a>

                     <?php } ?>
        </div>
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
