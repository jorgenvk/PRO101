@extends('layout.master')
@section('tittel', 'Adminpanel')

@include('layout.header')

@section('body')

<p>Gratulerer, du er innlogget!</p>

<a href="{{ route('logout') }}"
    onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
    Logg ut, {{ Auth::user()->name }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

@stop