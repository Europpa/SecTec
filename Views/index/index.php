<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
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
				<li role="presentation"><a href="#alumno" aria-controls="alumno" role="tab" data-toggle="tab">Portal del Alumno</a></li>
				<li role="presentation"><a href="#administradores" aria-controls="administradores" data-toggle="tab">Portal Administradores</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="alumno">
				    <br>	
					<h4 class="text-center">Acceso Alumno</h4>
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
				<div role="tabpanel" class="tab-pane fade" id="administradores">	
				    <br>	
					<h4 class="text-center">Acceso Administradores</h4>
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
</body>
<!--LINKEA TODOS LOS CSS-->
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'estiloslogin.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.theme.css';?>" type="text/css">
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'bootstrap.min.js';?>"></script>
=======
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
				        <li role="presentation" class="active"><a href="#alumno" aria-controls="alumno" role="tab" data-toggle="tab">Portal del Alumno</a></li>
				        <li role="presentation"><a href="#administradores" aria-controls="administradores" data-toggle="tab">Portal Administradores</a></li>
			        </ul>
			        <div class="tab-content">
				        <div role="tabpanel" class="tab-pane fade in active" id="alumno">
				            <br>	
					        <h4 class="text-center">Ingrese los datos del Alumno</h4>
					        <br>
   	   	                    <form class="form-horizontal">
			                <div class="form-group">
			                    <label for="inputEmail3" class="col-sm-3 control-label">Matricula</label>
				                <div class="col-sm-9">
				                    <input type="text" class="form-control" name="matricula">
				                </div>
				            </div>        
				        </div>
                    </div>
				</div>
   	   	    </div>
   	   </div>
   </body>
   <!--LINKEA TODOS LOS CSS-->
   <link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
   <link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.theme.css';?>" type="text/css">
   <link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'estilos.css';?>" type="text/css">
   <script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
   <script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'bootstrap.min.js';?>"></script>
>>>>>>> ceff51b2dfe699392022f4e69ec57a2d74d082a6
</html>