@extends('layouts.app')

@section('precontent')
	<img src="img/backgrounds/world.jpg" alt="world" style="width:100%">
@endsection

@section('content')
    <!-- success messages -->
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
@endsection