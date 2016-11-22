$(document).on("click", ".btn-delete", function () {
	//me guardo el iglesia_id (que manda el button en el atributo "data-id")
    var iglesia_id = $(this).data('id');   

	$("#formDelete").attr("action", "iglesias/"+iglesia_id);
});