$(document).ready(function(){

});
$('#confirmPass').click(function(){
	$.ajax({
		type:"POST",
		data: $('#frm-changepass').serialize(),
		dataType : 'json',
		url: "verificarPass",
		success:function(data){
			$('#warning-img').removeClass('hidden');
			$('#warning').removeClass();
			$('#warning').addClass('alert alert-success');
			$('#warning').html(data.status + ', redireccionando al panel espere unos segundos...');
			setTimeout(function(){
  				$('#warning').html('<strong>Success: </strong>' + 'Listo NOOB :D ');      
  			}, 2500);
		},
		error:function(req, status, error){
			$('#warning').removeClass();
			$('#warning').addClass('alert alert-danger');
   			$('#warning').html('<strong>Error: </strong>' + req.responseText);      
		}
	});
});