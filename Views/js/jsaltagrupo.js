$('form#frm_altagrupos').submit(function(){
    var form = $('#frm_altagrupos').serialize();
	$.ajax({
		type: "POST",
		data: form,
		dataType: 'json',
		url: "guardarGrupo",
		success: function(res){
			$('#warning').removeClass();
			$('#warning').addClass('alert alert-success');
			$('#warning').html('<strong>Guardado: </strong>' + res.msg);
			setTimeout("location.href='listaGrupos'",1500 );
		},
		error: function(req, status, error){
			$('#warning').removeClass();
			$('#warning').addClass('alert alert-danger');
			$('#warning').html('<strong>Error: </strong>' + req.responseText);
            console.log(req.responseText);
		},
	});

	return false;
});
