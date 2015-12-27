<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="UTF-8">
	<title>Administración de Usuarios</title>
	<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'Views' . DS . 'datatables' . DS . 'css' . DS . 'dataTables.bootstrap.min.css' ?>">	
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
	<table id="tablita" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Puesto</th>
            <th>Fecha de Registro</th>
        </tr>
    </thead>
</table>

</section>

<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>

<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jsusuario.js';?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo BASE_URL . 'Views' . DS . 'datatables' . DS . 'js' . DS . 'jquery.dataTables.min.js' ?>"></script>	
<script type="text/javascript" charset="utf8" src="<?php echo BASE_URL . 'Views' . DS . 'datatables' . DS . 'js' . DS . 'dataTables.bootstrap.js' ?>"></script>
</body>
</html>