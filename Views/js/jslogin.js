$(document).ready(function(){

});
	$('#logon').click(function(){
		$.ajax({
			type: "POST",
			data: $('#logone').serialize(),
			dataType : 'json',
			url: "login/acceso", 
			success: function(res){
   				setTimeout(function(){    
   					$(location).attr("href",res.url);
   				}, 1000);
			},
			error: function(req, status, error){
				$('#warning').removeClass();
				$('#warning').addClass('alert alert-danger col-md-4 col-md-offset-4');
   				$('#warning').html('<strong>Error: </strong>' + req.responseText);      
  			},
  			beforeSend: function(){	
  				$('#alerta').removeClass('hidden');	
  				$('#boton').removeClass('col-md-offset-2');
  			},
  			complete: function(){
  				setTimeout(function(){
  					$('#alerta').addClass('hidden');	
  					$('#boton').addClass('col-md-offset-2');	
  				}, 1000);
  			}
		});
	});