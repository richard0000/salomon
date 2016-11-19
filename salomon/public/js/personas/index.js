$(document).on("click", ".btn-delete", function () {
	//me guardo el persona_id (que manda el button en el atributo "data-id")
    var persona_id = $(this).data('id');   

	$("#formDelete").attr("action", "personas/"+persona_id);
});