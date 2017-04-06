<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Test/prototype for bildeopplasting</title>

<!-- Midlertidig link til TwitterBootstrap - byttes ut med egen CSS etterhvert -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Link til jQuery - nødvendig for at filen skal lastes opp umiddelbart etter valg -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style type="text/css">
.bildeboks {
  background-color: whitesmoke;
  height: 200px;
  margin: 10px;
  padding: 5px;
  border-style: solid;
}
.lastoppboks {
  background-color: whitesmoke;
  height: 200px;
  margin: 10px;
  padding: 5px;  
  border-style: dashed;
}
</style>
</head>
<body>

    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <h1>Test av funksjonalitet - opplasting til S3</h1>
    <hr>
    <form method="POST" name="formLastOppBilde" enctype="multipart/form-data" action="{{ url('bilder/upload') }}">
      {{ csrf_field() }}
      <label class="btn btn-info" for="file-bilde">
        <input id="file-bilde" navn="file-bilde" type="file" style="display:none;"><span class="glyphicon glyphicon-camera"></span>
      </label><br>
      <input type="submit" class="btn btn-info" style="margin-top: 10px;" value="Last opp bilder">
    </form>
    </div>
    </div>

    @include ('layout.status-ok')

    @include ('layout.status-error')


    <div class="row">
    <div class="col-md-12">
    <h1>Test/prototype for bildeopplasting</h1>
    <hr>
    <div class="col-sm-2 lastoppboks">

    <form action="{{ url('bilder/upload') }}" method="POST" enctype="multipart/form-data" name="formBilderUpload" id="formBilderUpload">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <label class="btn btn-info pull-right" for="fil" style="margin-left: 10px;">
      <input id="fil" name="fil" type="file" style="display: none;"/>
      <span class="glyphicon glyphicon-camera"></span>
      </label>
    </form>
    </div>


    <div class="col-sm-2 bildeboks">
    </div>

    <div class="col-sm-2 bildeboks">
    </div>

    <div class="col-sm-2 bildeboks">
    </div>

    <div class="col-sm-2 bildeboks">
    </div>

    <div class="col-sm-2 bildeboks">
    </div>

    <div class="col-sm-2 bildeboks">
    </div>

    <div class="col-sm-2 bildeboks">
    </div>
    </div>
    </div>

    </div> <!-- /container -->

<script>
$(function () {
  $("#fil").on("change", function(){
    $('form#formBilderUpload').submit();
  });
  });
</script>

</body>
</html>