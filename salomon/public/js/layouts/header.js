$('#iglesias').on('change', function(){
	iglesiaId = $('#iglesias').val();

	$.ajax({
		url:  'api/iglesia',
        type: 'PATCH',
        data: {id: + iglesiaId, _method: "PATCH"},

		success:  function (especialidad)
		{
			//recargamos la url actual
			location.reload();
		}
	});
});