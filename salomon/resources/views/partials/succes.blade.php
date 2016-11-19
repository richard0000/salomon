<div id="w3-pnl" class="w3-panel w3-green">
	<span class="w3-closebtn">&times;</span>
	<h3>&Eacute;xito!</h3>
	<p>{{ Session::get('flash_message') }}</p>
</div>

{{ Html::script('js/partials/closepanel.js') }}