<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Secundaria Tecnica 127</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
<div class="container-fluid" id="encabezado">
	<div class="page-header">
  		<h1 class="text-center">Sistema de Administracion <small>Escuela Técnica 127</small></h1>
	</div>
</div>

<div class="container col-md-4 col-md-offset-4" id="containernav">
	<br>
	<div class="container col-md-9 col-md-offset-2">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#admin" aria-controls="admin" role="tab" data-toggle="tab">Administrador</a></li>
		    <li role="presentation"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">Usuario</a></li>
		</ul>
	</div>

	<div class="container col-md-10 col-md-offset-1">
		<!-- Tab panes -->
		<div class="tab-content">
			
			<div role="tabpanel" class="tab-pane fade in active" id="admin">
				<br>
				<h4 class="text-center">Login Administrador</h4>
				<br>
		    	<form class="form-horizontal" method="POST" action="<?php echo BASE_URL . 'login' . DS . 'login';?>">
					<div class="form-group">
		    			<div class="col-md-12">
		      				<input type="text" class="form-control" id="inputEmail3" placeholder="Matricula" name="adminmat" value="<?php echo isset($this->data['adminmat']) ? $this->data['adminmat'] : "" ?>">
		    			</div>
		  			</div>
		  			<div class="form-group">
					    <div class="col-md-12">
					    	<input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña" name="adminpass" value="<?php echo isset($this->data['adminpass']) ? $this->data['adminpass'] : "" ?>">
					    </div>
		  			</div>
		  			<div class="form-group">
		  				<div class="col-md-8 col-md-offset-2">
		  					<input type="submit" class="btn btn-primary btn-md btn-block">
		  				</div>
		  			</div>
		  		</form>
		    </div>

			<div role="tabpanel" class="tab-pane fade" id="user">
				<br>
				<h4 class="text-center">Login Alumno</h4>
				<br>
		    	<form class="form-horizontal">
					<div class="form-group">
		    			<div class="col-md-12">
		      				<input type="text" class="form-control" id="inputEmail3" placeholder="Matricula Alumno">
		    			</div>
		  			</div>
		  			<div class="form-group">
					    <div class="col-md-12">
					    	<input type="password" class="form-control" id="inputPassword3" placeholder="Fecha de nacimiento">
					    </div>
		  			</div>
		  			<div class="form-group">
		  				<div class="col-md-8 col-md-offset-2">
		  					<input type="submit" class="btn btn-primary btn-md btn-block">
		  				</div>
		  			</div>
		  		</form>
			</div>
		</div>   
	</div>	
</div>
<?php 
if (isset($this->response)){
?>
	<div class="list-group-item list-group-item-danger col-md-4 col-md-offset-4" id="alerta">
	<?php
	echo $this->response;
	?>	
	</div>
<?php 
}else{
	echo "";
}		
?>

</body>

<!--LINKEA TODOS LOS CSS-->
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.theme.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'estiloslogin.css';?>" type="text/css">
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'bootstrap.min.js';?>"></script>
</html>