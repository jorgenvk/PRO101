@extends('layout.master')
@section('tittel', 'Adminpanel - Westfinder')

@include('layout.header')

@section('body')
    <div id="topcontainer">
        <a href="{{ url('bedrift/ny') }}" class="btn btn-primary btn-lg">Legg til ny bedrift</a>
        <a href="{{ url('arrangement/ny') }}" class="btn btn-primary btn-lg">Legg til nytt arrangement</a>
        <a href="{{ url('bedrift/admin') }}" class="btn btn-primary btn-lg">Slett/Endre bedrift</a>
    </div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

@stop

<style>
    #topcontainer{
        text-align: center;
        padding-top: 80px;
    }
</style>