@if(session()->has('status_ok'))
	<div class="clearfix">
		<div class="alert alert-success col-md-6 col-md-offset-3">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<img src="{{ url('/ikoner/Vellykket_Ikon.png') }}" class="status_ikoner">
		{!! session('status_ok') !!}
	</div>
	</div>
@endif