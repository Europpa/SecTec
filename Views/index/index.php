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
		<div class="col-sm-offset-6 col-md-5">
		    <div class="panel panel-default">
                <div class="panel-body">
			        <ul class="nav nav-tabs" role="tablist">
				        <li role="presentation"><a href="#administradores" aria-controls="administradores"  data-toggle="tab">Portal Administador</a></li>
				        <li role="presentation"><a href="#alumno" aria-controls="alumno" data-toggle="tab">Portal Alumno</a></li>
			        </ul>
			        <div class="tab-content">
				        <div role="tabpanel" class="tab-pane fade in active" id="administradores">
				           <br>	
					       <h4 class="text-center">Acceso Administradores</h4>
					       <br>
					        <form class="form-horizontal">
						        <div class="form-group">
					    	        <label for="inputMatricula" class="sr-only">Matricula</label>
					      		    <input type="text" id="inputMatricula" class="form-control" placeholder="Matricula" required="" autofocus="">
					  	        </div>
					  	        <div class="form-group">
					  	        	<label for="inputContraseña3" class="sr-only">Contraseña</label>
					      		    <input type="password" id="inputcontraseña" class="form-control" placeholder="Contraseña" required="" autofocus="">					 
					  	        </div>
					            <div class="form-group">
					    	        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
					            </div>
					        </form>
				            </div>
				            <div role="tabpanel" class="tab-pane fade" id="alumno">	
				            <br>	
					        <h4 class="text-center">Acceso Alumno</h4>
					        <br>
					        <form class="form-horizontal">
						        <div class="form-group">
					    	        <label for="inputMatricula" class="sr-only">Matricula</label>
					      		    <input type="text" id="inputMatricula" class="form-control" placeholder="Matricula" required="" autofocus="">
					        	</div>
					  	        <div class="form-group">
					    	        <label for="inputContraseña3" class="sr-only">Contraseña</label>
					      		    <input type="password" id="inputcontraseña" class="form-control" placeholder="Contraseña" required="" autofocus="">
					  	        </div>
					            <div class="form-group">
					    	        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
					            </div>
					        </form>
					    </br>   
					</br>     
				</div>
			</div>
		</div>	
	</div>
</div>
</body>
<!--LINKEA TODOS LOS CSS-->
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.theme.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'estiloslogin.css';?>" type="text/css">
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'bootstrap.min.js';?>"></script>
</html>