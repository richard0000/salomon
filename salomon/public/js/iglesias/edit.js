$(function(){
	$('#datepicker').val(
		$('#datepicker').val().substring(8, 10)+$("#datepicker").val().substring(4, 8)+$("#datepicker").val().substring(0, 4)
	);
});