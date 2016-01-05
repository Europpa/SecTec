<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
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
		<a href="" class="list-group-item active">Inicio</a>
		<a href="<?php echo BASE_URL . 'usuarios'?>" class="list-group-item">Administración de usuarios</a>
		<a href="<?php echo BASE_URL . 'grupos'?>" class="list-group-item">Administración de grupos</a>
		<a href="" class="list-group-item">Administración de clases</a>
		<a href="" class="list-group-item">Administración de ciclo escolar</a>
	</div>
</aside>
<section class="main-container col-md-9">
	<div class="page-header">
  		<h4 class="text-center">Sistema de control principal</h4>
	</div>
	<article class="col-md-3 col-md-offset-4">
		<img src="<?php echo BASE_URL . 'Views' . DS . 'Img' . DS . 'lapiz.png'?>" alt="" width="350px" heigth="350px">
	</article>
</section>
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.theme.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'password.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'home.css';?>" type="text/css">
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'bootstrap.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jsconfirmpass.js';?>"></script>


</body>
</html>
