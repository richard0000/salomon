@extends('layouts.modal-delete')

@section('modal-delete-content')
    {!! Form::open([
        'method' => 'DELETE',
        'route' => ['ocupaciones.destroy', 1],
        'id' => 'formDelete'
    ]) !!}

    {!! Form::submit('Aceptar', ['class' => 'w3-btn w3-grey']) !!}

    {!! Form::close() !!}
    <p></p>
@endsection