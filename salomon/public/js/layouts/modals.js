/**
* abrir y cerrar modal para crear un recurso
*/
$(document).on("click", "#w3-open-create", function () {
	$('#modal-create').attr('style', 'display: block')
	$('.w3-input').first().focus();
});

$(document).on("click", "#w3-close-create", function () {
	$('#modal-create').attr('style', 'display: none');
});

/**
* abrir y cerrar modal para modificar un recurso
*/
$(document).on("click", "#w3-open-edit", function () {
	$('#modal-edit').attr('style', 'display: block');
	$('.w3-input').first().focus();
});

$(document).on("click", "#w3-close-edit", function () {
	$('#modal-edit').attr('style', 'display: none');
});

/**
* abrir y cerrar modal para eliminar un recurso
*/
$(document).on("click", "#w3-open-delete", function () {
	$('#modal-delete').attr('style', 'display: block');
});

$(document).on("click", "#w3-close-delete", function () {
	$('#modal-delete').attr('style', 'display: none');
});