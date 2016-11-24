@extends('layouts.modal-create')

@section('modal-create-title')
	Nuevo Territorio
@endsection

@section('modal-create-content')
	{!! Form::open(['url' => 'territorios']) !!}
		<p>
		    {!! Form::label('descripcion', 'Nombre:') !!}
		    {!! Form::text('descripcion', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%']) !!}
		</p>

		<p>
			{!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey'])  !!}
		</p>
	{!! Form::close() !!} 
@endsection