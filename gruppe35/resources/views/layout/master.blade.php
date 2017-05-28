@include('layout.footer')
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

<!-- Midlertidig link til TwitterBootstrap - byttes ut med egen CSS etterhvert -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<!-- Link til jQuery Script for dynamisk oppdatering av adresse i kartet -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Link til Boostrap JS for "lukking av dialogbokser" -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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