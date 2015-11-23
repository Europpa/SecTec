<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="UTF-8">
	<title>No encontrado</title>
</head>
<body>
	<div id="error"><?php echo isset($this->msg) ? $this->msg : '';?></div>
	<?php if(Sessiones::autenticado()){?>
		<ul>
			<li><a href="<?php echo BASE_URL.'home';?>">Regresar al Menu</a></li>
			<li><a href="javascript:history.back(1)">Regresar a la página anterior</a></li>
		</ul>
	<?php } ?>	
</body>
</html>