<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
	<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'Views' . DS . 'datatables' . DS . 'css' . DS . 'dataTables.bootstrap.min.css' ?>">
	<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'responsive.dataTables.min.css';?>">
	<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'password.css';?>" type="text/css">
	<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'home.css';?>" type="text/css">
</head>
<body>
<div class="container-fluid" id="header">
	<div class="col-md-12">
		<div class="col-md-1">
			<img src="<?php echo $this->foto;?>" alt="..." class="img-thumbnail" id="fotografia">
		</div>
		<div class="col-md-9" id="data">
			<strong>Bienvenido al sistema de administración y control escuela secundaria técnica 127</strong>
			<ul class="list-inline">
				<li><strong>Matricula: </strong><?php echo $this->matricula; ?></li>
				<li><strong>Nombre: </strong><?php echo $this->nombre; ?></li>
				<li><strong>Rango: </strong><?php echo $this->rango; ?></li>
			</ul>
		</div>
		<div class="col-md-2">
			<a href="<?php echo BASE_URL . 'login' . DS . 'cerrarSession'; ?>" class="btn btn-primary" id="cerrar">Cerrar Sesión</a>
		</div>
	</div>
</div>

<aside class="col-md-3" id="navbar-menu">
	<h4 class="text-center">Categorias:</h4>
	<div class="list-group">
		<a href="<?php echo BASE_URL . 'home'?>" class="list-group-item">Inicio</a>
		<a href="<?php echo BASE_URL . 'usuarios'?>" class="list-group-item active">Administración de usuarios</a>
		<a href="<?php echo BASE_URL . 'grupos'?>" class="list-group-item">Administración de grupos</a>
		<a href="" class="list-group-item">Administración de clases</a>
		<a href="" class="list-group-item">Administración de ciclo escolar</a>
	</div>
</aside>
<section class="main-container col-md-9">
	<div class="page-header">
  		<nav class="navbar navbar-default">
  			<div class="container-fluid">
    			<div class="navbar-header">
    				<div class="navbar-brand">Seleccione:</div>
    				<a href="<?php echo BASE_URL . 'usuarios'; ?>" class="btn btn-info navbar-btn"><span class="glyphicon glyphicon-info-sign"></span> Ultimos usuarios registrados</a>
    				<a href="<?php echo BASE_URL . 'usuarios/listaUsuarios'; ?>" class="btn btn-primary navbar-btn active"><span class="glyphicon glyphicon-search"></span> Listar todos los usuarios</a>
    				<a href="<?php echo BASE_URL . 'usuarios/altaUsuarios'; ?>" class="btn btn-success navbar-btn"><span class="glyphicon glyphicon-plus"></span> Alta Usuario</a>
    			</div>
	  		</div>
		</nav>
	</div>


	<table id="allusers" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
        	<th>Id</th>
            <th>Matricula</th>
            <th>Nombre</th>
			<th>Puesto</th>
			<th>Rango</th>
			<th>Fecha de Registro</th>
			<th>Editar</th>
			<th>Antiguedad en la Sep (A/M/D)</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Celular</th>
        </tr>
    </thead>
</table>
</section>



<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header" id="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="titulo">Actualizar <span id="old_matricula"></span></h4>
	    	</div>
			<!-- INICIO DEL FORMULARIO -->
     		<div class="modal-body" id="modal-body">
				<form class="form-horizontal" id="frmUser" method="post" enctype="multipart/form-data">
					<br>
					<div class="form-group">
						<label for="rango" class="col-md-3 control-label">Rango:</label>
						<h4 class="col-md-3"><span class="label label-primary" id="rango"></span></h4></label>
					</div>
					<div class="form-group">
						<label for="foto" class="col-md-3 control-label">Fotografia Actual:</label>
						<div class="col-md-4">
							<img src="" alt="" class="img-circle" id="foto" width="100px" height="100px;">
						</div>
					</div>

					<div class="form-group">
						<label for="newfoto" class="col-md-3 control-label">Cambiar Fotografia:</label>
						<div class="col-md-5">
							<input type="file" name="newfoto" class="form-control" id="newfoto">
						</div>
					</div>

					<div class="form-group">
						<label for="puesto" class="col-md-3 control-label">Puesto:</label>
						<div class="col-md-5">
							<input type="text" name="puesto" class="form-control" id="puesto">
						</div>
					</div>
					<div class="form-group">
						<label for="nombre" class="col-md-3 control-label">Nombre:</label>
						<div class="col-md-5">
							<input type="text" name="nombre" class="form-control" id="nombre">
						</div>
					</div>
					<div class="form-group">
						<label for="a_paterno" class="col-md-3 control-label">Apellido Paterno:</label>
						<div class="col-md-5">
							<input type="text" name="a_paterno" class="form-control" id="a_paterno">
						</div>
					</div>
					<div class="form-group">
						<label for="a_materno" class="col-md-3 control-label">Apellido Materno:</label>
						<div class="col-md-5">
							<input type="text" name="a_materno" class="form-control" id="a_materno">
						</div>
					</div>
					<div class="form-group">
						<label for="telefono" class="col-md-3 control-label">Telefono:</label>
						<div class="col-md-5">
							<input type="text" name="telefono" class="form-control" id="telefono">
						</div>
					</div>
					<div class="form-group">
						<label for="celular" class="col-md-3 control-label">Celular:</label>
						<div class="col-md-5">
							<input type="text" name="celular" class="form-control" id="celular">
						</div>
					</div>
					<div class="form-group">
						<label for="correo" class="col-md-3 control-label">Correo:</label>
						<div class="col-md-5">
							<input type="text" name="correo" class="form-control" id="correo">
						</div>
					</div>
				</form>
      		</div>
			<div class="hidden alert alert-info col-md-10 col-md-offset-1" role="alert" id="warning"></div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        	<button type="button" class="btn btn-primary" id="update">Guardar los Cambios</button>
	      	</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jsallusuario.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'bootstrap.min.js';?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo BASE_URL . 'Views' . DS . 'datatables' . DS . 'js' . DS . 'jquery.dataTables.min.js' ?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo BASE_URL . 'Views' . DS . 'datatables' . DS . 'js' . DS . 'dataTables.bootstrap.js' ?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo BASE_URL . 'Views' . DS . 'js' . DS . 'dataTables.responsive.min.js' ?>"></script>
</html>
