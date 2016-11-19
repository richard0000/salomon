$(document).on("click", ".btn-edit", function () {
	//me guardo el ocupacion_id (que manda el button en el atributo "data-id")
    var ocupacion_id = $(this).data('id');   

	//consulto para obtener los datos del ocupacion correspondiente en BD
    $.ajax({
		url:  'api/ocupacion',
        type: 'GET',
        data: 'id=' + ocupacion_id,

		success:  function (ocupacion)
		{
			$("#formEdit").attr("action", "ocupaciones/"+ocupacion_id);
			$("#descripcion_e").val( ocupacion.descripcion);
			$("#descripcion_e").focus();
		}
	});
});

$(document).on("click", ".btn-delete", function () {
	//me guardo el ocupacion_id (que manda el button en el atributo "data-id")
    var ocupacion_id = $(this).data('id');   

	$("#formDelete").attr("action", "ocupaciones/"+ocupacion_id);
});