$(document).on("click", ".btn-delete", function () {
	//me guardo el pastor_id (que manda el button en el atributo "data-id")
    var pastor_id = $(this).data('id');   

	$("#formDelete").attr("action", "pastores/"+pastor_id);
});