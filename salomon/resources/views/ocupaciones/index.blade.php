@extends('layouts.app')

@section('precontent')
@endsection

@section('content')
	@include('partials.messages')

	<!--Encabezado-->
	<div class="w3-panel w3-display-container w3-card-8" style="height:100px;">
		<div class="w3-row">
			<div class="w3-col m6 l11">
				<h1>Ocupaciones</h1>
			</div>
			<div class="w3-col m6 l1 w3-display-right">
				<a id="w3-open-create" class="w3-btn-floating w3-teal">+</a>
			</div>
		</div>
	</div>

	<!--Lista de ocupaciones-->
    @include('ocupaciones.list')

	<!--Ventana modal para creación de ocupaciones-->
    @include('ocupaciones.create')

    <!--Ventana modal para edición de ocupaciones-->
    @include('ocupaciones.edit')

    <!--Ventana modal para eliminación de ocupaciones-->
    @include('ocupaciones.delete')
@endsection

@section('scripts')
	{{ Html::script('js/layouts/modals.js') }}
	{{ Html::script('js/ocupaciones/index.js') }}
@endsection