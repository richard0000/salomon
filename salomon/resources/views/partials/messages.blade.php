<!-- success messages -->
@if(Session::has('flash_message'))
	@include('partials.succes')
@endif

<!-- error messages -->
@if($errors->any())
	@include('partials.danger')
@endif