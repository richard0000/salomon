@extends('layouts.app')

@section('precontent')
@endsection

@section('content')
	<!--Encabezado-->
	<div class="w3-panel w3-display-container w3-card-8" style="height:100px;">
		<div class="w3-row">
			<div class="w3-col m6 l11">
				<h1>Modificar Datos de Diezmo </h1>
			</div>
			<div class="w3-col m6 l1 w3-display-right">
			</div>
		</div>
	</div>
    {!! Form::model($diezmo, [
    	'method' => 'PATCH', 
    	'route' => ['diezmos.update', $diezmo->id]])
     !!}
		<p>
		    <label for="fecha" class="{{ $errors->has('fecha') ? ' w3-validate' : '' }}">Fecha:</label>
		    {!! Form::text('fecha', null, ['id' => 'datepicker']) !!}
	        @if ($errors->has('fecha'))
	             <div class="w3-animate-fading w3-text-red">
	                {{ $errors->first('fecha') }}
	            </div>
	        @endif
		</p>

		<p>
		    {!! Form::label('persona_id', 'Persona:') !!}
		    {!! Form::select('persona_id', $personas, null, ['class' => 'w3-input']) !!}
		</p>

		<p>
			<label for="importe" class="{{ $errors->has('importe') ? ' w3-validate' : '' }}">Importe:</label>
		    {!! Form::text('importe', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
	        @if ($errors->has('importe'))
	             <div class="w3-animate-fading w3-text-red">
	                {{ $errors->first('importe') }}
	            </div>
	        @endif
		</p>

		<p>
			{!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey'])  !!}
		</p>
	{!! Form::close() !!} 
@endsection

@section('scripts')
	{{ Html::script('js/datepicker.js') }}
	{{ Html::script('js/diezmos/edit.js') }}
@endsection