<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cambia tu password</title>
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

<div class="container">
	<div class="col-md-6 col-md-offset-3" id="formulario-password">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Felicitaciones <?php echo $this->nick; ?>!</strong></h3>
			</div>
			<div class="panel-body">
				<p>Bienvenido al sistema de administración y control, se ha detectado que es tu primer ingreso al sistema y por motivos de seguridad tendrás que cambiar tu contraseña para ingresar al panel principal.
				</p>
				<p><strong>Instrucciones: </strong>Rellene los campos que se piden debajo</p>
				<br>
				<form class="form-horizontal" id="frm-changepass">
					<div class="form-group">
						<label for="" class="col-md-4 control-label">Nueva Contraseña: </label>
						<div class="col-md-6">
							<input type="password" class="form-control" name="pass" id="pass">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-4 control-label">Confirmación:</label>
						<div class="col-md-6">
							<input type="password" class="form-control" name="Cpass" id="Cpass">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 col-md-offset-4">
							<input type="button" class="btn btn-warning" value="Confirmar" id="confirmPass">
						</div>
						<div class="col-md-2 hidden" id="warning-img">
							<img src="<?php echo BASE_URL . 'Views' . DS  . 'Img' . DS . 'progress.gif'; ?>"  alt="" height="30px" width="30px" id="warning-img">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-md-offset-3">
		<div class="alert alert-danger hidden" id="warning" role="alert"></div>
	</div>
</div>
		
</body>
<!--LINKEA TODOS LOS CSS-->
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.theme.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'password.css';?>" type="text/css">
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'bootstrap.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jsconfirmpass.js';?>"></script>

</html>