@extends('layouts.modal-create')

@section('modal-create-title')
	Nuevo Idioma
@endsection

@section('modal-create-content')
	{!! Form::open(['url' => 'idiomas']) !!}
		<p>
		    {!! Form::label('descripcion', 'Nombre:') !!}
		    {!! Form::text('descripcion', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
			{!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey'])  !!}
		</p>
	{!! Form::close() !!} 
@endsection