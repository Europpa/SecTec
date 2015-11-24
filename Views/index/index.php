<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Secundaria Tecnica 127</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
<div class="container">
	<div class="row">
	    <br>
		<div class="col-sm-offset-4 col-md-4">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#alumno" aria-controls="alumno" role="tab" data-toggle="tab">Portal Alumno</a></li>
				<li role="presentation"><a href="#administradores" aria-controls="administradores" data-toggle="tab">Portal Administradores</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="alumno">
				    <br>	
					<h4 class="text-center">Acceso AlumnoSS</h4>
					<br>
					<form class="form-horizontal">
						<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-3 control-label">Email</label>
					    	<div class="col-sm-9">
					      		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
					    	<div class="col-sm-9">
					      		<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
					    	</div>
					  	</div>
					<div class="form-group">
					    <div class="col-sm-offset-3 col-sm-9">
					    	<button type="submit" class="btn btn-default">Sign in</button>
					    </div>
					</div>
					</form>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="administradores">	
				    <br>	
					<h4 class="text-center">Acceso AdministradorRR</h4>
					<br>
					<form class="form-horizontal">
						<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-3 control-label">Email</label>
					    	<div class="col-sm-9">
					      		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
					    	<div class="col-sm-9">
					      		<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
					    	</div>
					  	</div>
					    <div class="form-group">
					        <div class="col-sm-offset-3 col-sm-9">
					    	    <button type="submit" class="btn btn-default">Sign in</button>
					        </div>
					    </div>
					</form>
				</div>
			</div>
		</div>	
	</div>
</div>
</body>
<!--LINKEA TODOS LOS CSS-->
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'estilos.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.theme.css';?>" type="text/css">
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'bootstrap.min.js';?>"></script>
</html>