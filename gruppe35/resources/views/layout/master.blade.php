
@include('layout.header')
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>@yield('tittel')</title>

<!-- Link til Bootstrap og egen CSS -->
<link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ url('/css/style.css') }}" type="text/css" />
<!-- Ekstern link til font - Lato -->
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<!-- Link til jQuery Script for dynamisk oppdatering av adresse i kartet -->
<script src="{{ url('/js/jquery-3.2.1.min.js') }}"></script>
<!-- Link til Boostrap JS for "lukking av dialogbokser" -->
<script src="{{ url('/js/bootstrap.min.js') }}"></script>
@yield('header')
</head>
<body>

   <div class="container-fluid">

     @yield('body')

      <!-- Håndterer feilmeldinger og OK status -->
      @include ('layout.status-ok')
      @include ('layout.status-error')

    </div> <!-- /container -->

</body>
</html>
<style>
    body {
        padding-top: 80px;
        padding-bottom: 100px;
    }
</style>
@include('layout.footer')