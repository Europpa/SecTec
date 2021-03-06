<?php
class usersModel extends Model{
	public function __construct(){
		parent::__construct();
	}

	public function top10(){
		$query = 'SELECT usr.matricula, CONCAT(usr.nombre, " ",usr.a_paterno, " ",usr.a_materno) as nombre, usr.correo, usr.puesto, usr.fecha_registro
				FROM usuarios usr
				ORDER BY usr.id_usuario DESC LIMIT 10;';
		$resultado = $this->query($query);
		return  $resultado->fetchAll();
	}
	public function allusers(){
		$query = 'SELECT
		usr.id_usuario,
		usr.matricula,
		CONCAT(usr.nombre," ",usr.a_paterno," ",usr.a_materno) AS nombre,
		usr.telefono,
		usr.celular,
		usr.correo,
		usr.antiguedad_ingreso_sep,
		usr.puesto,
		ran.nombre as rango,
		usr.fecha_registro,
		usr.CURP,
		usr.RFC,
		usr.fecha_nacimiento,
		usr.domicilio,
		usr.ingreso_tecs
		FROM usuarios usr JOIN rangos ran
		ON usr.id_rango = ran.id_rango ORDER BY usr.id_usuario DESC';
		$resultado = $this->query($query);
		return $resultado->fetchAll();
	}

	public function allranges(){
		$query = 'SELECT
		ran.id_rango,
		ran.nombre
		FROM rangos ran';
		$resultado = $this->query($query);
		return $resultado->fetchAll();
	}

	public function newUser($data){
		$datos = array(
			':matricula' => $data['matricula'],
			':contrasena' => md5($data['matricula']),
			':change_pass' => 0,
			':nombre' => $data['nombre'],
			':a_paterno' => $data['a_paterno'],
			':a_materno' => $data['a_materno'],
			':telefono' => $data['telefono'],
			':celular' => $data['celular'],
			':email' => $data['email'],
			':fecha' => $data['fecha'],
			':puesto' => $data['puesto'],
			':foto' => $data['foto'],
			':range' => $data['rango'],
			':fecha_tecs' => $data['fecha_tecs'],
			':curp' => $data['curp'],
			':fecha_nacimiento' => $data['fecha_nacimiento'],
			':rfc' => $data['rfc'],
			':domicilio' => $data['domicilio']);
		$query = 'INSERT INTO usuarios
			(matricula,contrasena,change_pass,nombre,a_paterno,a_materno,telefono,celular,correo,antiguedad_ingreso_sep,puesto,fotografia,id_rango,CURP,RFC,fecha_nacimiento,domicilio,ingreso_tecs)
			VALUES
			(:matricula,:contrasena,:change_pass,:nombre,:a_paterno,:a_materno,:telefono,:celular,:email,:fecha,:puesto,:foto,:range,:curp,:rfc,:fecha_nacimiento,:domicilio,:fecha_tecs)';
		$resultado = $this->query($query,$datos);
	}
	public function existeUsuario($data){
		$datos = array(':matricula' => $data);
		$query = 'SELECT * FROM usuarios WHERE matricula = :matricula';
		$res = $this->query($query,$datos);
		if($res->rowCount() >= 1){
			return true;
		}
	}
	public function getUser($id){
		$datos = array(':id' => $id);
		$query = 'SELECT
		usr.matricula,
		usr.nombre,
		usr.a_paterno,
		usr.a_materno,
		usr.telefono,
		usr.celular,
		usr.correo,
		usr.puesto,
		usr.fotografia,
		ran.nombre as rango,
		usr.CURP,
		usr.RFC,
		usr.fecha_nacimiento,
		usr.domicilio,
		usr.ingreso_tecs
		FROM usuarios usr JOIN rangos ran
		ON usr.id_rango = ran.id_rango
		WHERE id_usuario = :id';
		$res = $this->query($query,$datos);
		$registros = $res->fetch();
		$row = array(
			'matricula' => $registros['matricula'],
			'nombre' => $registros['nombre'],
			'a_paterno' => $registros['a_paterno'],
			'a_materno' => $registros['a_materno'],
			'telefono' => $registros['telefono'],
			'celular' => $registros['celular'],
			'correo' => $registros['correo'],
			'puesto' => $registros['puesto'],
			'fotografia' => PHOTOS . $registros['fotografia'],
			'rango' => $registros['rango'],
			'curp' => $registros['CURP'],
			'rfc' => $registros['RFC'],
			'fecha_nacimiento' => $registros['fecha_nacimiento'],
			'domicilio' => $registros['domicilio'],
			'fecha_tecs' => $registros['ingreso_tecs']
		);
		return $row;
	}

	public function getPhoto($id){
		$data = array(':matricula' => $id);
		$query = 'SELECT fotografia FROM usuarios WHERE matricula = :matricula';
		$res = $this->query($query,$data);
		return $res->fetch();
	}

	public function updateUser($data){
		$datos = array(
		':old_mat' => $data['old_mat'],
		':photo' => $data['photo'],
		':puesto' => $data['puesto'],
		':nombre' => $data['nombre'],
		':a_paterno' => $data['a_paterno'],
		':a_materno' => $data['a_materno'],
		':telefono' => $data['telefono'],
		':celular' => $data['celular'],
		':correo' => $data['email'],
		':rfc' => $data['rfc'],
		':curp' => $data['curp'],
		':fecha_nacimiento' => $data['fecha_nacimiento'],
		':domicilio' => $data['domicilio']
		);
		$query = 'UPDATE usuarios SET
		fotografia = :photo,
		puesto = :puesto,
		nombre = :nombre,
		a_paterno = :a_paterno,
		a_materno = :a_materno,
		telefono = :telefono,
		celular = :celular,
		correo = :correo,
		CURP = :curp,
		RFC = :rfc,
		fecha_nacimiento = :fecha_nacimiento,
		domicilio = :domicilio
		WHERE matricula = :old_mat';
		$this->query($query,$datos);
	}
}
