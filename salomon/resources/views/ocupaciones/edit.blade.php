@extends('layouts.modal-edit')

@section('modal-edit-title')
	Editar Ocupaci&oacute;n
@endsection

@section('modal-edit-content')
        {!! Form::open(['method' => 'PATCH', 'id' => 'formEdit', 'route' => ['ocupaciones.update', $persona->id]]) !!}
		<p>
		    {!! Form::label('descripcion', 'Nombre:') !!}
		    {!! Form::text('descripcion', null, ['class' => 'w3-input',' id' => 'descripcion_e']) !!}
		</p>

		<p>
			{!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey'])  !!}
		</p>
	{!! Form::close() !!} 
@endsection