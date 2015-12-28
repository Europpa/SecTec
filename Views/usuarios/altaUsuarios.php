<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
	<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
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
		<a href="" class="list-group-item">Administración de grupos</a>
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
    				<a href="<?php echo BASE_URL . 'usuarios'; ?>" class="btn btn-info navbar-btn active"><span class="glyphicon glyphicon-info-sign"></span> Ultimos usuarios registrados</a>
    				<a href="<?php echo BASE_URL . 'usuarios/listaUsuarios'; ?>" class="btn btn-primary navbar-btn"><span class="glyphicon glyphicon-search"></span> Listar todos los usuarios</a>
    				<a href="<?php echo BASE_URL . 'usuarios/altaUsuarios'; ?>" class="btn btn-success navbar-btn"><span class="glyphicon glyphicon-plus"></span> Alta Usuario</a>
    			</div>
	  		</div>
		</nav>
	</div>

<section>
	<form class="form-horizontal" id="frm-usuario" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="rango" class="col-md-2 control-label">Rango:</label>
			<div class="col-md-3">
				<select name="rango" id="rango" class="form-control">
					<?php foreach ($this->rangos as $val) { ?>
						<option value="<?php echo $val['id_rango']; ?>">
							<?php echo $val['nombre']; ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<label for="telefono" class="col-md-2 control-label">Telefono:</label>
			<div class="col-md-3">
				<input type="text" name="telefono" class="form-control" id="telefono" tabindex="6">
			</div>
		</div>

		<div class="form-group">
			<label for="puesto" class="col-md-2 control-label">Puesto:</label>
			<div class="col-md-3">
				<input type="text" name="puesto" class="form-control" id="puesto" tabindex="1">
			</div>

			<label for="celular" class="col-md-2 control-label">Celular:</label>
			<div class="col-md-3">
				<input type="text" name="celular" class="form-control" id="celular" tabindex="7">
			</div>
		</div>

		<div class="form-group">
			<label for="matricula" class="col-md-2 control-label">Matricula:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" id="matricula" name="matricula" tabindex="2">
			</div>

			<label for="correo" class="col-md-2 control-label">Email:</label>
			<div class="col-md-3">
				<input type="email" name="correo" class="form-control" id="correo" tabindex="8">
			</div>
		</div>

		<div class="form-group">
			<label for="nombre" class="col-md-2 control-label">Nombre:</label>
			<div class="col-md-3">
				<input type="text" name="nombre" class="form-control" id="nombre" tabindex="3">
			</div>
			<label for="foto" class="col-md-2 control-label">Fotografia:</label>
			<div class="col-md-3">
				<input type="file" name="foto" class="form-control" id="foto" tabindex="9">
			</div>
		</div>

		<div class="form-group">
			<label for="a_paterno" class="col-md-2 control-label">Apellido Paterno:</label>
			<div class="col-md-3">
				<input type="text" name="a_paterno" class="form-control" id="a_paterno" tabindex="4">
			</div>
			<label for="fecha" class="col-md-2 control-label">Fecha de ingreso a la SEP:</label>
			<div class="col-md-3">
				<input type="date" name="fecha" class="form-control" id="fecha" tabindex="10">
			</div>
		</div>

		<div class="form-group">
			<label for="a_materno" class="col-md-2 control-label">Apellido Materno:</label>
			<div class="col-md-3">
				<input type="text" name="a_materno" class="form-control" id="a_materno" tabindex="5">
			</div>
			<div class="col-md-3 col-md-offset-2">
				<button class="btn btn-primary btn-block" tabindex="11">Guardar</button>
			</div>
		</div>
	</form>
	<div class="col-md-4 col-md-offset-3">
		<div class="alert alert-danger hidden" role="alert" id="warning"></div>
	</div>
</section>

<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jsaltausuario.js';?>"></script>
</body>
</html>
