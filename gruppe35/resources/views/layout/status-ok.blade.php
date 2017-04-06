@if(session()->has('status_ok'))
	<div class="clearfix">
		<div class="alert alert-success col-md-6">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{!! session('status_ok') !!}
	</div>
	</div>
@endif