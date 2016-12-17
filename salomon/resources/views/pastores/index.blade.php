@extends('layouts.app')

@section('precontent')
@endsection

@section('content')
	@include('partials.messages')

	<!--Encabezado-->
	<div class="w3-panel w3-display-container w3-card-8" style="height:100px;">
		<div class="w3-row">
			<div class="w3-col m6 l11">
				<h1>Pastores</h1>
			</div>
			<div class="w3-col m6 l1 w3-display-right">
				{!! Form::open([
					'method' => 'GET',
					'route' => ['pastores.create']
				]) !!}

					{!! Form::submit('+', ['class' => 'w3-btn w3-btn-floating w3-teal']) !!}

				{!! Form::close() !!} 
			</div>
		</div>
	</div>

	<!--Lista de pastores-->
    @include('pastores.list')

    <!--Ventana modal para eliminación de pastores-->
    @include('pastores.delete')
@endsection

@section('scripts')
	{{ Html::script('js/layouts/modals.js') }}
	{{ Html::script('js/pastores/index.js') }}
@endsection