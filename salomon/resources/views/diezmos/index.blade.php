@extends('layouts.app')

@section('precontent')
@endsection

@section('content')
	@include('partials.messages')

	<!--Encabezado-->
	<div class="w3-panel w3-display-container w3-card-8" style="height:100px; background-image: url('img/backgrounds/hands.jpg');">
		<div class="w3-row">
			<div class="w3-col m6 l11">
				<h1>Diezmos</h1>
			</div>
			<div class="w3-col m6 l1 w3-display-right">
				{!! Form::open([
					'method' => 'GET',
					'route' => ['diezmos.create']
				]) !!}

				{!! Form::submit('+', ['class' => 'w3-btn w3-btn-floating w3-teal']) !!}

				{!! Form::close() !!} 
			</div>
		</div>
	</div>

	<div class="w3-panel w3-display-container w3-card-8" style="height:100px;">
		<div class="w3-row">
			<div class="w3-col m6 l11">
				{!! Form::open([
					'method' => 'GET',
					'route' => ['diezmos.index']
				]) !!}

				    {!! Form::label('persona_id', 'Persona:') !!}
				    {!! Form::select('persona_id', $personas, $persona_id, ['class' => 'w3-input']) !!}
			</div>
			<div class="w3-col m6 l1">
				    <div class="w3-display-right">
						{!! Form::button('<i class="fa fa-search"></i>', ['class' => 'w3-btn w3-btn-floating w3-teal', 'type' => 'submit']) !!}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	<div class="w3-panel w3-display-container w3-card-8" style="height:100px;">
		<div class="w3-row">
			<div class="w3-col m6 l12">
				<!--Lista de diezmos-->
	    		@include('diezmos.list')
			<div>
			<div class="w3-col m6 l0">
				@include('diezmos.graph')
	    	</div>
	    </div>
    </div>

    <!--Ventana modal para eliminación de diezmos-->
    @include('diezmos.delete')
@endsection

@section('scripts')
	{{ Html::script('js/layouts/modals.js') }}
	{{ Html::script('js/diezmos/index.js') }}
@endsection