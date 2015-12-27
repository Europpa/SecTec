<?php
class loginModel extends Model{
	public function __construct(){
		parent::__construct();
	}
	public function login($datos){
		$data = array(
			':matricula' => $datos['matricula'],
			':password' => md5($datos['password']));
		$query = 'SELECT usr.id_usuario, usr.matricula, usr.change_pass, usr.nombre, usr.a_paterno, usr.a_materno, usr.fotografia, ran.id_rango ,ran.nombre as rango 
				FROM usuarios usr INNER JOIN rangos ran 
				ON usr.id_rango = ran.id_rango
				WHERE usr.matricula = :matricula AND usr.contrasena = :password';
			

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
				'id_rango' => $usuario['id_rango'],
				'rango' => $usuario['rango'],
				'autenticado' => True
				);
			return $vars;
		}else{
			return False;
		}
	}

	public function cambiarPassword($datos){
		$data = array(
			':pass' => md5($datos['pass']),
			':id' => $datos['user'],
			':matricula' => $datos['matricula']);
		$query = 'UPDATE usuarios SET 
			usuarios.change_pass = 1, usuarios.contrasena = :pass
			WHERE usuarios.id_usuario = :id AND usuarios.matricula = :matricula';
		
			$resultado = $this->query($query,$data);
			if(!$resultado){
				return false;
			}
		return true;
	}

}

 ?>