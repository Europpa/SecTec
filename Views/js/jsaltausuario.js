$(document).ready(function(){

});
$('form#frm-usuario').submit(function(){
	var form = new FormData($(this)[0]);
	$.ajax({
		type: "POST",
		data: form,
		async: false,
		dataType: 'json',
		url: "guardarUsuario",
		success: function(res){
			$('#warning').removeClass();
			$('#warning').addClass('alert alert-success');
			$('#warning').html('<strong>Guardado: </strong>' + res.msg);  
		},
		error: function(req, status, error){
			$('#warning').removeClass();
			$('#warning').addClass('alert alert-danger');
			$('#warning').html('<strong>Error: </strong>' + req.responseText);  
		},
		cache: false,
        contentType: false,
        processData: false
	});

	return false;
});