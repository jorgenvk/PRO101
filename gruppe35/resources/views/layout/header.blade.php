<!-- ::::: HEADER ::::: -->
<nav class="navbar navbar-default navbar-static-top">

<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="{{ url('/') }}"><img src="/bilder/logo.png" style="height:50px;"></a>
</div>

<!-- VENSTRE SIDE-->
<div id="navbar" class="collapse navbar-collapse">
<ul class="nav navbar-nav">  <!-- class="active" -->
  <li><a href="{{ url('bedrift/list') }}"><img src="{{ url('icons/Bedrift.png') }}" width="50px"> Alle</a></li>
@foreach (App\Kategori::orderBy('Kategori_navn', 'asc')->get() as $kategori)
  <li><a href="{{ url('bedrift/list', [$kategori->Kategori_navn, 'Alfabetisk']) }}">
  <img src="{{ url('icons/'.$kategori->Kategori_navn.'.png') }}" width="50px">{{ $kategori->Kategori_navn }}</a></li>
@endforeach
</ul>

<!-- HØYRE SIDE -->
<form class="navbar-form sokeboks" method="POST" action="{{ url('bedrift/search') }}" name="search" id="search" role="search">
{{ csrf_field() }}
  <div class="form-group">
    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Søk her..">
  </div>
  <button type="submit" class="btn btn-default">Søk</button>
</form>


</div><!--/.nav-collapse -->

</nav>
