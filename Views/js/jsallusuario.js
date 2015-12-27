$(document).ready( function () {

    var table = $('#allusers').DataTable({
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
        	"url" : "../usuarios/allusers",
        	"type": "POST",
        	"dataSrc": ""
        },
        "columns" : [
            {"data": "id_usuario"},
        	{"data": "matricula"},
        	{"data": "nombre"},
            {"data": "correo"},
            {"data": "telefono"},
            {"data": "celular"},
            {"data": "antiguedad_ingreso_sep"},
            {"data": "puesto"},
            {"data": "rango"},
        	{"data": "fecha_registro"},
            /*{
                "data": null,
                defaultContent:'<button class="btn btn-success" id="edit">Editar</button><button class="btn btn-danger" id="baja">Baja</button>'
            }*/
            {"defaultContent":"<button class='btn btn-success' id='edit'>Editar</button>"}
        ],


    });

    $('#allusers tbody').on('click','button#edit',function(){
        var data = table.row($(this).parents('tr')).data();
        $('#myModal').modal();
        $.getJSON("getUsuario",{id:data[0]},function(json){
            $('#modal-body #foto').attr('src',json.fotografia+'?'+(new Date()).getTime());
            $('#modal-body #rango option[value='+json.id_rango+']').attr('selected', 'selected');
            $('#modal-header span#old_matricula').text(json.matricula);
            $('#modal-body #matricula').val(json.matricula);
            $('#modal-body #nombre').val(json.nombre);
            $('#modal-body #a_paterno').val(json.a_paterno);
            $('#modal-body #a_materno').val(json.a_materno);
            $('#modal-body #telefono').val(json.telefono);
            $('#modal-body #celular').val(json.celular);
            $('#modal-body #correo').val(json.correo);
            $('#modal-body #puesto').val(json.puesto);
        });
    });

    $('#update').on('click',function(){
        var formulario = new FormData($('#frmUser')[0]);
        formulario.append('old_mat', $('#modal-header span#old_matricula').text());
        $.ajax({
            type: 'POST',
            data: formulario ,
            dataType: 'JSON',
            async: false,
            url:'updateUser',
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
                $('#warning').removeClass();
    			$('#warning').addClass('alert alert-danger col-md-10  col-md-offset-1');
    			$('#warning').html('<strong>Error: </strong>' + req.responseText);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    });

});
