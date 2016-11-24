@extends('layouts.app')

@section('precontent')
@endsection

@section('content')
	<!--Encabezado-->
	<div class="w3-panel w3-display-container w3-card-8" style="height:100px;">
		<div class="w3-row">
			<div class="w3-col m6 l11">
				<h1>Nueva Iglesia</h1>
			</div>
			<div class="w3-col m6 l1 w3-display-right">
<!--				<span class="w3-badge w3-xxlarge w3-padding w3-grey"><i class="fa fa-money"></i></span>-->
			</div>
		</div>
	</div>

	{!! Form::open(['url' => 'iglesias']) !!}
		<p>
		    {!! Form::label('nombre', 'Nombre:') !!}
		    {!! Form::text('nombre', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
		</p>

		<p>
		    {!! Form::label('direccion', 'Direccion:') !!}
		    {!! Form::text('direccion', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
		</p>

		<p>
		    {!! Form::label('telefono1', 'Tel&eacute;fono 1:') !!}
		    {!! Form::text('telefono1', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
		</p>

		<p>
		    {!! Form::label('telefono2', 'Tel&eacute;fono 2:') !!}
		    {!! Form::text('telefono2', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
		</p>

		<p>
		    {!! Form::label('telefono3', 'Tel&eacute;fono 3:') !!}
		    {!! Form::text('telefono3', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
		</p>

		<p>
		    {!! Form::label('email', 'Email:') !!}
		    {!! Form::text('email', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
		</p>

		<p>
		    {!! Form::label('pastor_id', 'Pastor:') !!}
		    {!! Form::select('pastor_id', $personas, null, ['class' => 'w3-input']) !!}
		</p>

		<p>
			{!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey'])  !!}
		</p>
	{!! Form::close() !!} 
@endsection