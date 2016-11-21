<!-- Navbar -->
<nav class="w3-sidenav w3-white w3-card-2" style="display:none" id="mySidenav">
	<a href="javascript:void(0)" 
	onclick="w3_close()"
	class="w3-closenav w3-large">Cerrar &times;</a>
	<a href="{{ url('/personas') }}"><i class="fa fa-user"></i> Personas</a>
	<a href="{{ url('/diezmos') }}"><i class="fa fa-money"></i> Diezmos</a>
	<div class="w3-accordion">
		<a id="accordeon-conf">
			<i class="fa fa-cog"></i>
			Configuracion
		</a>
		<div id="Demo1" class="w3-accordion-content">
			<a href="{{ url('/ocupaciones') }}">
				<i class="fa fa-graduation-cap"></i> Ocupaciones
			</a>
			<a href="{{ url('/idiomas') }}">
				<i class="fa fa-language"></i> Idiomas
			</a>
			<a href="{{ url('/edadcategorias') }}">
				<i class="fa fa-child"></i> Categor&iacute;as de Edad
			</a>
			<a href="{{ url('/territorios') }}">
				<i class="fa fa-map-marker"></i> Territorios
			</a>
		</div>
	</div>
</nav>

{{ Html::script('js/layouts/accordeon.js') }}