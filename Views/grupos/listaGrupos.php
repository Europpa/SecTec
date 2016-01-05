<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="UTF-8">
	<title>Administración de Usuarios</title>
	<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'bootstrap.min.css';?>" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'Views' . DS . 'datatables' . DS . 'css' . DS . 'dataTables.bootstrap.min.css' ?>">
	<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'password.css';?>" type="text/css">
	<link rel="stylesheet" href="<?php echo BASE_URL.'Views'.DS.'css'.DS.'home.css';?>" type="text/css">
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
		<a href="<?php echo BASE_URL . 'home'?>" class="list-group-item">Inicio</a>
		<a href="<?php echo BASE_URL . 'usuarios'?>" class="list-group-item">Administración de usuarios</a>
		<a href="<?php echo BASE_URL . 'grupos'?>" class="list-group-item active">Administración de grupos</a>
		<a href="" class="list-group-item">Administración de clases</a>
		<a href="" class="list-group-item">Administración de ciclo escolar</a>
	</div>
</aside>

<section class="main-container col-md-9">
	<div class="page-header">
  		<nav class="navbar navbar-default">
  			<div class="container-fluid">
    			<div class="navbar-header">
    				<div class="navbar-brand">Seleccione:</div>
    				<a href="<?php echo BASE_URL . 'grupos'; ?>" class="btn btn-info navbar-btn"><span class="glyphicon glyphicon-info-sign"></span> Ultimos grupos registrados</a>
    				<a href="<?php echo BASE_URL . 'grupos/listaGrupos'; ?>" class="btn btn-primary navbar-btn active"><span class="glyphicon glyphicon-search"></span> Listar todos los grupos</a>
    				<a href="<?php echo BASE_URL . 'grupos/altaGrupos'; ?>" class="btn btn-success navbar-btn"><span class="glyphicon glyphicon-plus"></span> Alta grupo</a>
    			</div>
	  		</div>
		</nav>
	</div>

	<table id="tbl_allgrupos" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Grado</th>
            <th>Grupo</th>
            <th>Turno</th>
            <th>Editar</th>
        </tr>
    </thead>
	</table>
</section>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header" id="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="titulo">Actualizar <span id="id_gp"></span></h4>
      		</div>

      		<div class="modal-body" id="modal-body">
				<form action="" class="form-horizontal" id="frm-grupo">
					<div class="form-group">
				    	<label for="grado" class="col-md-2 control-label">Grado:</label>
				    	<div class="col-md-3">
							<select class="form-control" name="grado" id="grado">
								<option value="1">Primero</option>
								<option value="2">Segundo</option>
								<option value="3">Tercero</option>
							</select>
						</div>
				    </div>

					<div class="form-group">
						<label for="grupo" class="col-md-2 control-label">Grupo:</label>
						<div class="col-md-3">
							<select class="form-control" name="grupo" id="grupo">
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
								<option value="F">F</option>
								<option value="G">G</option>
								<option value="H">H</option>
								<option value="I">I</option>
								<option value="J">J</option>
								<option value="K">K</option>
								<option value="L">L</option>
								<option value="M">M</option>
								<option value="N">N</option>
								<option value="O">O</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="turno" class="col-md-2 control-label">Turno:</label>
						<div class="col-md-3">
							<select name="turno" class="form-control" id="turno">
								<option value="M">Matutino</option>
								<option value="V">Vespertino</option>
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="hidden alert alert-danger col-md-10 col-md-offset-1" role="alert" id="warning"></div>
      		<div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		        <button type="button" class="btn btn-primary" id="update">Guardar los Cambios</button>
      		</div>
    	</div>
	</div>
</div>
</body>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jquery-2.1.4.min.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'jsallgrupo.js';?>"></script>
<script src="<?php echo BASE_URL.'Views'.DS.'js'.DS.'bootstrap.min.js';?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo BASE_URL . 'Views' . DS . 'datatables' . DS . 'js' . DS . 'jquery.dataTables.min.js' ?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo BASE_URL . 'Views' . DS . 'datatables' . DS . 'js' . DS . 'dataTables.bootstrap.js' ?>"></script>
</html>
