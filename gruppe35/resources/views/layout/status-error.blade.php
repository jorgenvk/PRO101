@if (count($errors) > 0)
	<div class="clearfix">
    <div class="alert alert-danger col-md-6 col-md-offset-3" style="margin-top: 10px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <img src="{{ url('/ikoner/Error_Ikon.png') }}" class="status_ikoner">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    </div>
@endif