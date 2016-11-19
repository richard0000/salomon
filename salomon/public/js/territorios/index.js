$(document).on("click", ".btn-edit", function () {
	//me guardo el territorio_id (que manda el button en el atributo "data-id")
    var territorio_id = $(this).data('id');   

	//consulto para obtener los datos del territorio correspondiente en BD
    $.ajax({
		url:  'api/territorio',
        type: 'GET',
        data: 'id=' + territorio_id,

		success:  function (territorio)
		{
			$("#formEdit").attr("action", "territorios/"+territorio_id);
			$("#descripcion_e").val( territorio.descripcion);
			$("#descripcion_e").focus();
		}
	});
});

$(document).on("click", ".btn-delete", function () {
	//me guardo el territorio_id (que manda el button en el atributo "data-id")
    var territorio_id = $(this).data('id');   

	$("#formDelete").attr("action", "territorios/"+territorio_id);
});