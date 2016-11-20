$(document).on("click", ".btn-delete", function () {
	//me guardo el diezmo_id (que manda el button en el atributo "data-id")
    var diezmo_id = $(this).data('id');   

	$("#formDelete").attr("action", "diezmos/"+diezmo_id);
});