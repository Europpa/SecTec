<?php
class loginModel extends Model{
	public function __construct(){
		parent::__construct();
	}
	public function login($datos){
		$data = array(
			':matricula' => $datos['matricula'],
			':password' => md5($datos['password']));
		$query = 'SELECT * FROM usuarios WHERE matricula = :matricula and contrasena = :password';
		$resultado = $this->query($query,$data);
		if($resultado->rowCount() == 1){
			$usuario = $resultado->fetch();
			$vars = array(
				'id_user' => $usuario['id_usuario'],
				'matricula' => $usuario['matricula'],
				'passwordStatus' => $usuario['change_pass'], 
				'name' => $usuario['nombre'],
				'lastnameF' => $usuario['a_paterno'],
				'lastnameM' => $usuario['a_materno'],
				'photo' => $usuario['fotografia'],
				'rango' => $usuario['id_rango'],
				'autenticado' => True
				);
			return $vars;
		}else{
			return False;
		}
	}

	public function cambiarPass(){
		
	}

}

 ?>