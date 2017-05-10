@extends('layout.master')

@section('tittel', "$bedrift->Bedrift_navn")

@section('body')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="jumbotron">
        <h1> {{ $bedrift->Bedrift_navn }}</h1>
        <img src="{{ $bedrift->Bilde }}" class="bedriftbilde"/>
        <p> {{ $bedrift->Beskrivelse }} </p>
        <table class="table">
          <thead>
          <tr>
            <th>Kategori:</th>
            <th>Adresse:</th>
            <th>Telefon:</th>
            <th>Åpningstider:</th>
            <th>Nettside:</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $bedrift->kategori->Kategori_navn }}</td>
              <td>{{ $bedrift->Adresse }}</td>
              <td>{{ $bedrift->Telefon }}</td>
              <td>{{ $bedrift->Åpningstider }}</td>
              <td><a href="http://{{ $bedrift->Nettside }}">{{ $bedrift->Nettside }}</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
