<?php
class loginModel extends Model{
	public function __construct(){
		parent::__construct();
	}
	public function verificar($datos){
		$data = array(
			':matricula' => $datos['matricula']);
		$query = 'SELECT change_pass FROM usuarios WHERE matricula = :matricula';
		$resultado = $this->query($query,$data);
		$status = $resultado->fetch();
		return $status['change_pass'];
	}
	public function login(){
		
	}

}

 ?>