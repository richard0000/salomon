</header>
<header class="w3-container w3-teal">
	<span class="w3-opennav w3-xlarge" onclick="w3_open()" id="openNav">&#9776;</span>
	<div class="w3-panel w3-display-container" style="height:70px;">
		<div class="w3-row">
			<div class="w3-col m6 l10">
				<h1>Salomon</h1>
			</div>
			<div class="w3-col m6 l2 w3-display-right">
			    {!! Form::label('iglesiaS', 'Iglesia:', ['class' => 'w3-large']) !!}
			    {!! Form::select('iglesiaS', $iglesiaS, null, ['class' => 'w3-input w3-text-teal w3-large']) !!}
			</div>
		</div>
	</div>
</header>