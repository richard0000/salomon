<div id="w3-pnl" class="w3-panel w3-red">
	<span class="w3-closebtn">&times;</span>
	<h3>Errores</h3>
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>

{{ Html::script('js/partials/closepanel.js') }}