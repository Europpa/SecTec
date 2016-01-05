$(document).ready( function () {
    var table = $('#tbl_allgrupos').DataTable({
        "ordering": false,
        responsive: true,
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
        	"url" : "../grupos/allGrupos",
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
            }},
            {"defaultContent":"<button class='btn btn-success' id='edit'>Editar</button>"}
            /*{
                "data": null,
                defaultContent:'<button class="btn btn-success" id="edit">Editar</button><button class="btn btn-danger" id="baja">Baja</button>'
            }*/
        ],


    });

    $('#tbl_allgrupos tbody').on('click','button#edit',function(){
        var data = table.row($(this).parents('tr')).data();
        $('#myModal').modal();
        $.getJSON("getGrupo",{id:data['id_grupo']},function(json){
            console.log(json.id_grupo);
            $('#modal-header span#id_gp').text(json.id_grupo);
            $('#modal-body #grado option[value='+json.grado+']').attr('selected','selected');
            $('#modal-body #grupo option[value='+json.nom_grupo+']').attr('selected','selected');
            $('#modal-body #turno option[value='+json.turno+']').attr('selected','selected');
        });
    });

    $('#update').on('click',function(){
        var form = $("#frm-grupo").serializeArray();
        var idgp = $('#modal-header span#id_gp').text();
        form.push({name:'id',value:idgp});
        $.ajax({
            type: 'POST',
            data: form,
            dataType: 'JSON',
            url:'updateGrupo',
            success:function(data){
                $('#warning').removeClass();
    			$('#warning').addClass('alert alert-success col-md-10 col-md-offset-1');
    			$('#warning').html('<strong>Status: </strong>' + data.msg);
                setTimeout( function () {
                    $('#warning').addClass('hidden');
                    $('#myModal').modal('hide');
                    table.ajax.reload();
                }, 1500 );
            },
            error: function(req, status, error){
                console.log(req.responseText);
                $('#warning').removeClass();
    			$('#warning').addClass('alert alert-danger col-md-10  col-md-offset-1');
    			$('#warning').html('<strong>Error: </strong>' + req.responseText);
            }
        });
    });
});
