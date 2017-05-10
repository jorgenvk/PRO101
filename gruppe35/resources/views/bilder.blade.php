@extends ('layout.master')

@section('tittel') Bilder @stop

@section('header')
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
@stop

@section ('body')

<div class="row">
  <div class="col-md-12">
    <h1>Test/prototype for bildeopplasting</h1>
    <hr>
    <div class="col-sm-2 lastoppboks">

    <form action="{{ url('bilder/upload') }}" method="POST" enctype="multipart/form-data" name="formBilderUpload" id="formBilderUpload">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="Bedrift_id" value="6">
      <label class="btn btn-info pull-right" for="fil" style="margin-left: 10px;">
      <input id="fil" name="fil" type="file" style="display: none;"/>
      <span class="glyphicon glyphicon-camera"></span>
      </label>
    </form>
    </div>

    @foreach ($bedrift->bilder()->orderBy('created_at', 'desc')->get() as $bilde)
        <div class="col-sm-2 bildeboks">
          <img src="{{ Storage::disk('s3')->url($bilde->bilde) }}" class="img-responsive">
        </div>
    @endforeach

    </div>
</div><!-- ..row -->


<script>
$(function () {
  $("#fil").on("change", function(){
    $('form#formBilderUpload').submit();
  });
  });
</script>

@stop
