<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cambia tu password</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
    <div class="container-fluid" id="encabezado">
    	<div class="page-header">
    		<h1 class="text-center"> ¡Felicidades!<pre>Este ha sido su primer logeo, por favor cambie su contraseña ...</pre></h1>
   			
    	</div>
    	<a href="<?php echo BASE_URL . 'login' . DS . 'cerrarSession'; ?>">Cerrar Session</a>
	<?php 
	echo "<strong>Foto: </strong>".$this->foto;
	echo " ";
	echo "<strong>Matricula: </strong>".$this->matricula;
	echo " ";
	echo "<strong>Nombre: </strong>".$this->nombre;
	echo " ";
	echo "<strong>Rango: </strong>".$this->rango;
	?>


    </div>
    <div class="row">
	<div class="container col-md-4 col-md-offset-4" id="containernav">
	   <br>
      <form class="form-horizontal" action="<?php echo BASE_URL . 'cambiarpassword' . DS . 'changePassword';?>" method="POST">
        <h2 class="text-center">Actualice su contraseña</h2>
        <br>
		<div class="form-group">
        	     <h3  class="text-center" >Ingrese su nueva contraseña</h3>
			     <label for="inputcontractual" class="sr-only"></label>
			     <div class="col-sm-10 col-sm-offset-1 ">
			         <input type="password" id="inputcontractual" name="newpass" class="form-control"  required="" autofocus="">
		         </div>
		</div>
		<div class="form-group">
        	     <h3  class="text-center" >Confirme su nueva contraseña</h3>
			     <label for="inputcontractual" class="sr-only"></label>
			     <div class="col-sm-10 col-sm-offset-1 ">
			         <input type="password" id="inputcontractual" name="confirmpass" class="form-control"  required="" autofocus="">
		         </div>
		</div>
		<div class="form-group">
			<div class="col-md-8 col-md-offset-2">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Finalizar</button>
        </div>
      </form>
      <div id="warning"><?php echo isset($this->warning) ? $this->warning : ""; ?></div>
    </div> 
    </div>
</body>
<!--LINKEA TODOS LOS CSS-->
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.theme.css';?>" type="text/css">
<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'password.css';?>" type="text/css">
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'bootstrap.min.js';?>"></script>
</html>