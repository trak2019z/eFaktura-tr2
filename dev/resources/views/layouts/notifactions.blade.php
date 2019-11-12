@if(Session::has('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<span class="alert-icon"><i class="ni ni-like-2"></i></span>
	<span class="alert-text">{{ Session::get('info') }}</span>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   		<span aria-hidden="true">×</span>
	</button>
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<span class="alert-icon"><i class="ni ni-like-2"></i></span>
	<span class="alert-text">{{ Session::get('error') }}</span>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">×</span>
	</button>
</div>
@endif