@extends('layouts.modal-create')

@section('modal-create-title')
	Nueva Categor&iacute;a de Edad
@endsection

@section('modal-create-content')
	{!! Form::open(['url' => 'edadcategorias']) !!}
		<p>
		    {!! Form::label('descripcion', 'Descripci&oacute;n:') !!}
		    {!! Form::text('descripcion', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%', 'required' => 'required']) !!}
		</p>

		<p>
		    {!! Form::label('desde', 'Desde:') !!}
		    {!! Form::text('desde', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%', 'required' => 'required']) !!}
		</p>

		<p>
		    {!! Form::label('hasta', 'Hasta:') !!}
		    {!! Form::text('hasta', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%', 'required' => 'required']) !!}
		</p>

		<p>
			{!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey'])  !!}
		</p>
	{!! Form::close() !!} 
@endsection