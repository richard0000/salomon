$(function(){
	$.datepicker.setDefaults(
		$.extend( $.datepicker.regional[ '' ] )
	);
	$( '#datepicker' ).datepicker({
		changeMonth: true,
		changeYear: true,
		showAnim: 'blind',
		dateFormat: 'd-m-Y'
	});
});