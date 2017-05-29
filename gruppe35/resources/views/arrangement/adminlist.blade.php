@extends('layout.master')

@section('tittel', 'Slette/Endre - Westfinder')

@section('body')
   		<div class="col-md-12">
   			<h1>Resultat</h1>

   			<table class="table">
            <tr>
            <th>Admin</th>
            <th>Arrangement tittel</th>
				<th>Sted</th>
				<th>Tidspunkt - start</th>
				<th>Tidspunkt - slutt</th>
            <th>Beskrivelse</th>
   				</tr>
               @foreach ($arrangementer as $arrangement)
   				<tr>
            <td><a href="{{ url('arrangement/delete/'.$arrangement->id) }}" class="btn btn-danger btn-sm">Slett</a>
            <a href="{{ url('arrangement/edit', $arrangement->id) }}" class="btn btn-primary btn-sm">Endre</a></td>
                  <td>{{ $arrangement->tittel }}</td>
   					<td><a href="{{ url('bedrift/show', $arrangement->bedrift->id) }}">{{ $arrangement->bedrift->Bedrift_navn }}, {{ $arrangement->bedrift->Adresse }}</a></td>
   					<td>{{ $arrangement->starts_at }}</td>
   					<td>{{ $arrangement->ends_at }}</td>
   					<td>{{ substr($arrangement->beskrivelse, 0, 50) }}{{ strlen($arrangement->beskrivelse) > 50 ? "..." : "" }}</td>
   				</tr>
               @endforeach
   			</table>

   		</div>
@endsection
