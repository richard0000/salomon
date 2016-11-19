@extends('layouts.app')

@section('precontent')
@endsection

@section('content')
	@include('partials.messages')

	<!--Encabezado-->
	<div class="w3-panel w3-display-container w3-card-8" style="height:100px;">
		<div class="w3-row">
			<div class="w3-col m6 l11">
				<h1>Nueva Persona</h1>
			</div>
			<div class="w3-col m6 l1 w3-display-right">
			</div>
		</div>
	</div>

	{!! Form::open(['url' => 'personas']) !!}
		<p>
		    {!! Form::label('nombre', 'Nombre:') !!}
		    {!! Form::text('nombre', null, ['class' => 'w3-input', 'required' => 'required']) !!}
		</p>

		<p>
		    {!! Form::label('apellido', 'Apellido:') !!}
		    {!! Form::text('apellido', null, ['class' => 'w3-input', 'required' => 'required']) !!}
		</p>

		<p>
		    {!! Form::label('direccion', 'Direcci&oacute;n:') !!}
		    {!! Form::text('direccion', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('telefono1', 'Celular:') !!}
		    {!! Form::text('telefono1', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('telefono 2', 'Tel&eacute;fono Particular:') !!}
		    {!! Form::text('telefono 2', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('telefono 3', 'Tel&eacute;fono Laboral:') !!}
		    {!! Form::text('telefono 3', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('email', 'Email:') !!}
		    {!! Form::text('email', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
		    {!! Form::text('fecha_nacimiento', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('sexo', 'G&eacute;nero:') !!}
		    {!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('estado_civil', 'Estado Civil:') !!}
		    {!! Form::select('estado_civil', [1 => 'Casado', 2 => 'Soltero', 3 => 'Divorciado'], null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('idioma_id', 'Idioma:') !!}
		    {!! Form::select('idioma_id', $idiomas, null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('ocupacion_id', 'Ocupaci&oacute;n:') !!}
		    {!! Form::select('ocupacion_id', $ocupaciones, null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('territorio_id', 'Territorio:') !!}
		    {!! Form::select('territorio_id', $territorios, null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('observaciones', 'Observaciones:') !!}
		    {!! Form::textarea('observaciones', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
			{!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey'])  !!}
		</p>
	{!! Form::close() !!} 
@endsection

@section('scripts')
@endsection