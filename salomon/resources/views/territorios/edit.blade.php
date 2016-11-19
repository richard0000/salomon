@extends('layouts.modal-edit')

@section('modal-edit-title')
	Editar Territorio
@endsection

@section('modal-edit-content')
        {!! Form::open(['method' => 'PATCH', 'id' => 'formEdit', 'route' => ['territorios.update', 1]]) !!}
		<p>
		    {!! Form::label('descripcion', 'Nombre:') !!}
		    {!! Form::text('descripcion', null, ['class' => 'w3-input',' id' => 'descripcion_e']) !!}
		</p>

		<p>
			{!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey'])  !!}
		</p>
	{!! Form::close() !!} 
@endsection