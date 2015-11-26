<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cambia tu password</title>
</head>
<body>
	<h4>Haz entrado por primera ves cambia tu password para poder continuar</h4>
	<form action="<?php echo BASE_URL . 'cambiarpassword' . DS . 'changePassword';?>" method="POST">
		<label for="">Escriba su contraseña actual</label><input type="text" name="nowpass" id="" class=""><br>
		<label for="">Escribe su nueva contraseña</label><input type="text" name="newpass" id="" class=""><br>
		<label for="">Verifique su nueva contraseña</label><input type="text" name="confirmpass" id="" class=""><br>
		<input type="submit">
	</form>
<?php echo $this->data;?>
</body>
</html>