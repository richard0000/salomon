$(document).on("click", ".btn-edit", function () {
	//me guardo el edadcategoria_id (que manda el button en el atributo "data-id")
    var edadcategoria_id = $(this).data('id');   

	//consulto para obtener los datos del edadcategoria correspondiente en BD
    $.ajax({
		url:  'api/edadcategoria',
        type: 'GET',
        data: 'id=' + edadcategoria_id,

		success:  function (edadcategoria)
		{
			$("#formEdit").attr("action", "edadcategorias/"+edadcategoria_id);
			$("#descripcion_e").val( edadcategoria.descripcion);
			$("#desde_e").val( edadcategoria.desde);
			$("#hasta_e").val( edadcategoria.hasta);
			$("#descripcion_e").focus();
		}
	});
});

$(document).on("click", ".btn-delete", function () {
	//me guardo el edadcategoria_id (que manda el button en el atributo "data-id")
    var edadcategoria_id = $(this).data('id');   

	$("#formDelete").attr("action", "edadcategorias/"+edadcategoria_id);
});