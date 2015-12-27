$(document).ready( function () {
    $('#tablita').DataTable({
    	"language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontro nada",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
          	"search": "Buscar:",
      	 	"paginate": {
        		"first":      "Primero",
        		"last":       "Último",
		        "next":       "Siguiente",
		        "previous":   "Anterior"
    		},
        },
        "ajax": {
        	"url" : "usuarios/top10",
        	"type": "POST",
        	"dataSrc": ""
        },
        "columns" : [
        	{"data": "matricula"},
        	{"data": "nombre"},
        	{"data": "correo"},
        	{"data": "puesto"},
        	{"data": "fecha_registro"}
        ]

    });
    
} );