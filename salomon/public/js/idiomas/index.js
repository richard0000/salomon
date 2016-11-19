$(document).on("click", ".btn-edit", function () {
	//me guardo el idioma_id (que manda el button en el atributo "data-id")
    var idioma_id = $(this).data('id');   

	//consulto para obtener los datos del idioma correspondiente en BD
    $.ajax({
		url:  'api/idioma',
        type: 'GET',
        data: 'id=' + idioma_id,

		success:  function (idioma)
		{
			$("#formEdit").attr("action", "idiomas/"+idioma_id);
			$("#descripcion_e").val( idioma.descripcion);
			$("#descripcion_e").focus();
		}
	});
});

$(document).on("click", ".btn-delete", function () {
	//me guardo el idioma_id (que manda el button en el atributo "data-id")
    var idioma_id = $(this).data('id');   

	$("#formDelete").attr("action", "idiomas/"+idioma_id);
});