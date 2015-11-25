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
				<li role="presentation"><a href="#administradores" aria-controls="administradores" role="tab" data-toggle="tab">Portal Administradores</a></li>
				<li role="presentation"><a href="#alumnos" aria-controls="alumnos" data-toggle="tab">Portal Alumnos</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="administradores">
				    <br>	
					<h4 class="text-center">Acceso Administradores</h4>
					<br>
					<form class="form-horizontal" action="<?php echo BASE_URL . "index" . DS ."login"?>" method="POST">
						<div class="form-group">
					    	<label for="inputmatricula3" class="col-sm-3 control-label">Matricula</label>
					    	<div class="col-sm-9">
					      		<input type="text" class="form-control" id="inputmatricula3" name="adminmat" placeholder="Matricula" value="<?php echo isset($this->data['adminmat']) ? $this->data['adminmat'] : "";?>">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputContraseña3" class="col-sm-3 control-label">Contraseña</label>
					    	<div class="col-sm-9">
					      		<input type="password" class="form-control" id="inputContraseña3" name="adminpass" placeholder="Contraseña" value="<?php echo isset($this->data['adminpass']) ? $this->data['adminpass'] : "";?>">
					    	</div>
					  	</div>
					<div class="form-group">
					    <div class="col-sm-offset-3 col-sm-9">
					    	<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
					    </div>
					</div>
					</form>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="alumnos">	
				    <br>	
					<h4 class="text-center">Acceso Alumnos</h4>
					<br>
					<form class="form-horizontal">
						<div class="form-group">
					    	<label for="inputmatricula3" class="col-sm-3 control-label">Matricula</label>
					    	<div class="col-sm-9">
					      		<input type="text" class="form-control" id="inputmatricula3" name="matricula" placeholder="Matricula">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputContraseña3" class="col-sm-3 control-label">Contraseña</label>
					    	<div class="col-sm-9">
					      		<input type="password" class="form-control" id="inputContraseña3" name="contraseña" placeholder="Contraseña">
					    	</div>
					  	</div>
					    <div class="form-group">
					        <div class="col-sm-offset-3 col-sm-9">
					    	    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
					        </div>
					    </div>
					</form>
				</div>
			</div>
		</div>	
	</div>
</div>
<div class="respuesta"><?php echo isset($this->response) ? var_dump($this->response) : '';?></div>
</body>
<!--LINKEA TODOS LOS CSS-->
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'estiloslogin.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.theme.css';?>" type="text/css">
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'bootstrap.min.js';?>"></script>
</html>