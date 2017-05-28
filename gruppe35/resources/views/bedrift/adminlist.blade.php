@extends('layout.master')

@section('tittel', 'Admin')

@section('body')
   		<div class="col-md-12">
   			<h1>Resultat</h1>
            <a href="{{ url('bedrift/list') }}">Alle</a>
                        @foreach($kategorier as $kategori)
                           <a href="{{ url('bedrift/list/'.$kategori->Kategori_navn) }}"><img src="{{ url('icons/'.$kategori->Kategori_navn.'.png') }}" width="50px">{{ $kategori->Kategori_navn }}</a>
                        @endforeach


   			<table class="table">

   				<tr>
            <th>Admin</th>
            <th>Kategori</th>
   					<th>Bedriftens navn</th>
   					<th>Adresse</th>
   					<th>Tlf</th>

   					<th>Nettside</th>
   				</tr>
               @foreach ($bedrifter as $bedrift)
   				<tr>
            <td><a href="{{ url('bedrift/delete/'.$bedrift->id) }}" class="btn btn-danger btn-sm">Slett</a>
            <a href="{{ url('bedrift/edit', $bedrift->id) }}" class="btn btn-primary btn-sm">Endre</a></td>
            <td>{{ $bedrift->kategori->Kategori_navn }}</td>
   					<td><a href="{{ url('bedrift/show', $bedrift->id) }}">{{ $bedrift->Bedrift_navn }}</a></td>
   					<td>{{ $bedrift->Adresse }}</td>
   					<td>{{ $bedrift->Telefon }}</td>
   					<td>{{ $bedrift->Nettside }}</td>
   				</tr>
               @endforeach
   			</table>

   		</div>
@endsection
