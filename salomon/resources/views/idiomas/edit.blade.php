@extends('layouts.modal-edit')

@section('modal-edit-title')
	Editar Idioma
@endsection

@section('modal-edit-content')
        {!! Form::open(['method' => 'PATCH', 'id' => 'formEdit', 'route' => ['idiomas.update', 1]]) !!}
		<p>
		    {!! Form::label('descripcion', 'Nombre:') !!}
		    {!! Form::text('descripcion', null, ['class' => 'w3-input w3-animate-input', 'style' => 'width:40%', 'id' => 'descripcion_e']) !!}
		</p>

		<p>
			{!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey'])  !!}
		</p>
	{!! Form::close() !!} 
@endsection