@extends('layouts.modal-edit')

@section('modal-edit-title')
	Editar Categor&iacute;a de Edad
@endsection

@section('modal-edit-content')
        {!! Form::open(['method' => 'PATCH', 'id' => 'formEdit', 'route' => ['idiomas.update', 1]]) !!}
		<p>
		    {!! Form::label('descripcion', 'Descripci&oacute;n:') !!}
		    {!! Form::text('descripcion', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('desde', 'Desde:') !!}
		    {!! Form::text('desde', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
		    {!! Form::label('hasta', 'Hasta:') !!}
		    {!! Form::text('hasta', null, ['class' => 'w3-input']) !!}
		</p>

		<p>
			{!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey'])  !!}
		</p>
	{!! Form::close() !!} 
@endsection