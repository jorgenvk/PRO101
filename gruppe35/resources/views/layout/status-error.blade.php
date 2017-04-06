@if (count($errors) > 0)
	<div class="clearfix">
    <div class="alert alert-danger col-md-6" style="margin-top: 10px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    </div>
@endif