@extends('layouts.app')

@section('precontent')
@endsection

@section('content')
	<!--Encabezado-->
	<div class="w3-panel w3-display-container w3-card-8" style="height:100px;">
		<div class="w3-row">
			<div class="w3-col m6 l11">
				<h1>Nuevo Pastor</h1>
			</div>
			<div class="w3-col m6 l1 w3-display-right">
			</div>
		</div>
	</div>

	{!! Form::open(['url' => 'pastores']) !!}
		<p>
		    <label for="nombre" class="{{ $errors->has('nombre') ? ' w3-validate' : '' }}">Nombre:</label>
		    {!! Form::text('nombre', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%', 'required' => 'required' ]) !!}
	        @if ($errors->has('nombre'))
	             <div class="w3-animate-fading w3-text-red">
	                {{ $errors->first('nombre') }}
	            </div>
	        @endif
		</p>

		<p>
		    <label for="apellido" class="{{ $errors->has('apellido') ? ' w3-validate' : '' }}">Apellido:</label>
		    {!! Form::text('apellido', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%', 'required' => 'required' ]) !!}
	        @if ($errors->has('apellido'))
	             <div class="w3-animate-fading w3-text-red">
	                {{ $errors->first('apellido') }}
	            </div>
	        @endif
		</p>

		<p>
		    {!! Form::label('direccion', 'Direcci&oacute;n:') !!}
		    {!! Form::text('direccion', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
		</p>

		<p>
		    {!! Form::label('telefono1', 'Celular:') !!}
		    {!! Form::text('telefono1', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
		</p>

		<p>
		    {!! Form::label('telefono 2', 'Tel&eacute;fono Particular:') !!}
		    {!! Form::text('telefono 2', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
		</p>

		<p>
		    {!! Form::label('telefono 3', 'Tel&eacute;fono Laboral:') !!}
		    {!! Form::text('telefono 3', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
		</p>

		<p>
		    <label for="email" class="{{ $errors->has('email') ? ' w3-validate' : '' }}">Email:</label>
		    {!! Form::text('email', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
	        @if ($errors->has('email'))
	             <div class="w3-animate-fading w3-text-red">
	                {{ $errors->first('email') }}
	            </div>
	        @endif
		</p>

		<p>
		    <label for="fecha_de_nacimiento" class="{{ $errors->has('fecha_de_nacimiento') ? ' w3-validate' : '' }}">Fecha de Nacimiento:</label>
		    {!! Form::text('fecha_de_nacimiento', null, ['id' => 'datepicker']) !!}
	        @if ($errors->has('fecha_de_nacimiento'))
	             <div class="w3-animate-fading w3-text-red">
	                {{ $errors->first('fecha_de_nacimiento') }}
	            </div>
	        @endif
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
		    {!! Form::label('observaciones', 'Observaciones:') !!}
		    {!! Form::textarea('observaciones', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
			{!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey'])  !!}
		</p>
	{!! Form::close() !!} 
@endsection

@section('scripts')
	{{ Html::script('js/datepicker.js') }}
@endsection