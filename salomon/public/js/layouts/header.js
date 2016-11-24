$('#iglesias').on('click', function(){
	iglesiaId = $('#iglesias').val();

	$.ajax({
		url:  'api/iglesia',
        type: 'PATCH',
        data: {id: + iglesiaId, _method: "PATCH"},

		success:  function (especialidad)
		{
			console.log('success!');
		}
	});
});