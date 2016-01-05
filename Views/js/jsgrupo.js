$(document).ready( function () {
    $('#tbl-grupos').DataTable({
        "ordering": false,
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
        	"url" : "grupos/top5",
        	"type": "POST",
        	"dataSrc": ""
        },
        "columns" : [
        	{"data": "id_grupo"},
        	{"data": "grado"},
        	{"data": "nom_grupo"},
        	{"data": "turno", mRender: function(data,type,row){
                if(row.turno === 'V'){
                    return "Vespertino";
                }else if (row.turno === 'M') {
                    return "Matutino";
                }else{
                    return row.turno;
                }
            }}
        ]


    });
} );
