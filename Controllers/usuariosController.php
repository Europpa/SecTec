<?php
class usuariosController extends BaseController{
	private $model;
	public function __construct(){
		parent::__construct();
		$this->model = $this->loadModel('users');
		$this->getLibrary('EuroVal');
		$this->euroval = new EUROVAL();
	}
	public function index(){
		Sessiones::autenticado();
        $srcPhoto = PHOTOS . Sessiones::get_var('photo');
        $this->_View->foto = $srcPhoto;
        $this->_View->matricula = Sessiones::get_var('matricula');
        $this->_View->nick = Sessiones::get_var('name');
        $this->_View->nombre = Sessiones::get_var('name').' '.Sessiones::get_var('lastnameF').' '.Sessiones::get_var('lastnameM');
        $this->_View->rango = Sessiones::get_var('rango');

		$this->_View->render('usuarios');
	}

	public function top10(){
        $users = $this->model->top10();
        echo json_encode($users);
	}

	public function listaUsuarios(){
		Sessiones::autenticado();
        $srcPhoto = PHOTOS . Sessiones::get_var('photo');
        $this->_View->foto = $srcPhoto;
        $this->_View->matricula = Sessiones::get_var('matricula');
        $this->_View->nick = Sessiones::get_var('name');
        $this->_View->nombre = Sessiones::get_var('name').' '.Sessiones::get_var('lastnameF').' '.Sessiones::get_var('lastnameM');
        $this->_View->rango = Sessiones::get_var('rango');
        $users = $this->model->allranges();
        $this->_View->rangos = $users;
		$this->_View->render('allUsuarios');
	}
	public function allusers(){
		$users = $this->model->allusers();

		$a = array();
		foreach ($users as $user) {
			$ingreso = new DateTime($user['antiguedad_ingreso_sep']);
			$hoy = new DateTime("now");
			$intervalo = date_diff($ingreso,$hoy);
			$fechasep = $intervalo->format("%Y/%M/%D");
			array_push($a,array(
				'id_usuario' => $user['id_usuario'],
				'matricula' => $user['matricula'],
				'nombre' => $user['nombre'],
				'correo' => $user['correo'],
				'telefono' => $user['telefono'],
				'celular' => $user['celular'],
				'antiguedad_ingreso_sep' => $fechasep,
				'puesto' => $user['puesto'],
				'rango' => $user['rango'],
				'fecha_registro' => $user['fecha_registro'],
			));
		}
        echo json_encode($a);
	}

	public function altaUsuarios(){
		Sessiones::autenticado();
        $srcPhoto = PHOTOS . Sessiones::get_var('photo');
        $this->_View->foto = $srcPhoto;
        $this->_View->matricula = Sessiones::get_var('matricula');
        $this->_View->nick = Sessiones::get_var('name');
        $this->_View->nombre = Sessiones::get_var('name').' '.Sessiones::get_var('lastnameF').' '.Sessiones::get_var('lastnameM');
        $this->_View->rango = Sessiones::get_var('rango');
        $users = $this->model->allranges();
        $this->_View->rangos = $users;
		$this->_View->render('altaUsuarios');
	}

    public function getUsuario(){
        if(!isset($_GET['id'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
        $id = $_GET['id'];
        $data = $this->model->getUser($id);
        echo json_encode($data);
    }

	public function guardarUsuario(){

		if(!isset($_POST['rango'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
		if(!isset($_POST['telefono'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
		if(!isset($_POST['puesto'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
		if(!isset($_POST['celular'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
		if(!isset($_POST['matricula'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
	 	if(!isset($_POST['correo'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
		if(!isset($_POST['nombre'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
		if(!isset($_POST['a_paterno'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
		if(!isset($_POST['fecha'])){
            throw new Exception("Datos incorrectos");
            exit;
        }

        if(!isset($_POST['a_materno'])){
            throw new Exception("Datos incorrectos");
            exit;
        }

        if(!isset($_FILES['foto'])){
            throw new Exception("Datos incorrectos");
            exit;
        }

        $rango = $this->euroval->run('Rango',trim($_POST['rango']),array('required','integer'));
        if(is_array($rango)){
            foreach ($rango as $value) {
                throw new Exception($value);
            }
            exit;
        }

        $puesto = $this->euroval->run('Puesto',trim($_POST['puesto']),array('required','alphabetic'));
        if(is_array($puesto)){
            foreach ($puesto as $value) {
                throw new Exception($value);
            }
            exit;
        }

        $matricula = $this->euroval->run('Matricula', trim($_POST['matricula']),array('required','alpha_numeric'));
        if(is_array($matricula)){
            foreach ($matricula as $value) {
                throw new Exception($value);
            }
            exit;
        }

        $nombre = $this->euroval->run('Nombre',trim($_POST['nombre']),array('required','alphabetic'));
        if(is_array($nombre)){
            foreach ($nombre as $value) {
                throw new Exception($value);
            }
            exit;
        }

        $a_paterno = $this->euroval->run('Apellido Paterno',trim($_POST['a_paterno']),array('required','alphabetic'));
        if(is_array($a_paterno)){
            foreach ($a_paterno as $value) {
                throw new Exception($value);
            }
            exit;
        }

        $a_materno = $this->euroval->run('Apellido Materno',trim($_POST['a_materno']),array('required','alphabetic'));
        if(is_array($a_materno)){
            foreach ($a_materno as $value) {
                throw new Exception($value);
            }
            exit;
        }

        $telefono = $this->euroval->run('Telefono',trim($_POST['telefono']),array('required','integer'));
        if(is_array($telefono)){
            foreach ($telefono as $value) {
                throw new Exception($value);
            }
            exit;
        }

        $celular = $this->euroval->run('Celular',$_POST['celular'],array('required','integer'));
        if(is_array($celular)){
            foreach ($celular as $value) {
                throw new Exception($value);
            }
            exit;
        }

        $email = $this->euroval->run('Email',trim($_POST['correo']),array('required','email'));
        if(is_array($email)){
            foreach ($email as $value) {
                throw new Exception($value);
            }
            exit;
        }

        $fecha = $this->euroval->run('Fecha',trim($_POST['fecha']),array('required','date,Y-m-d'));
        if(is_array($fecha)){
            foreach ($fecha as $value) {
                throw new Exception($value);
            }
            exit;
        }

        $foto = $this->euroval->run('Fotografia',$_FILES['foto'],array('file_validate,1024,image/png|image/jpeg'));
        if(!array_key_exists('name',$foto) && !array_key_exists('type', $foto)){
            foreach($foto as $value){
                throw new Exception($value);
            }
            exit;
        }

        if($foto['error'] === 4){
            $photo = 'default.jpg';
        }else{
            $name = $foto['name'];
            $info = pathinfo($name);
            $extension = $info['extension'];
            $procesaNombre = 'urs_'.$matricula.'.'.$extension;
            $ruta = ROOT .'Views'. DS .'fotografias'. DS . $procesaNombre;
            $upload = @move_uploaded_file($foto['tmp_name'], $ruta);
            $photo = $procesaNombre;
            if(!$upload){
                throw new Exception($ruta);
                exit;
            }
        }

        $datos = array(
            'rango' => $rango,
            'puesto' => $puesto,
            'matricula' => $matricula,
            'nombre' => $nombre,
            'a_paterno' => $a_paterno,
            'a_materno' => $a_materno,
            'telefono' => $telefono,
            'celular' => $celular,
            'email' => $email,
            'foto' => $photo,
            'fecha' => $fecha
            );

        if($this->model->existeUsuario($matricula)){
            throw new Exception("Ya se encuentra un usuario registrado con la matricula ".$matricula);
        }else{
            $this->model->newUser($datos);
            $res = array('msg' => 'Datos guardados');
            echo json_encode($res);
        }
	}

    public function updateUser(){

		if(!isset($_POST['puesto'])){
			throw new Exception("Datos incorrectos");
			exit;
		}
		if(!isset($_POST['old_mat'])){
			throw new Exception("Datos incorrectosss");
			exit;
		}
		if(!isset($_POST['nombre'])){
			throw new Exception("Datos incorrectos");
			exit;
		}
		if(!isset($_POST['a_paterno'])){
			throw new Exception("Datos incorrectos");
			exit;
		}
		if(!isset($_POST['a_materno'])){
			throw new Exception("Datos incorrectos");
			exit;
		}
		if(!isset($_POST['telefono'])){
			throw new Exception("Datos incorrectos");
			exit;
		}
		if(!isset($_POST['celular'])){
			throw new Exception("Datos incorrectos");
			exit;
		}
		if(!isset($_POST['correo'])){
			throw new Exception("Datos incorrectos");
			exit;
		}
        if(!isset($_FILES['newfoto'])){
            throw new Exception("Datos incorrectos");
            exit;
        }

		$puesto = $this->euroval->run('Puesto',trim($_POST['puesto']),array('required','alphabetic'));
		if(is_array($puesto)){
			foreach ($puesto as $value) {
				throw new Exception($value);
			}
			exit;
		}

		$old_mat = $this->euroval->run('Vieja Matricula', trim($_POST['old_mat']),array('required','alpha_numeric'));
		if(is_array($old_mat)){
			foreach ($old_mat as $value) {
				throw new Exception($value);
			}
			exit;
		}
		
		$nombre = $this->euroval->run('Nombre',trim($_POST['nombre']),array('required','alphabetic'));
		if(is_array($nombre)){
			foreach ($nombre as $value) {
				throw new Exception($value);
			}
			exit;
		}

		$a_paterno = $this->euroval->run('Apellido Paterno',trim($_POST['a_paterno']),array('required','alphabetic'));
		if(is_array($a_paterno)){
			foreach ($a_paterno as $value) {
				throw new Exception($value);
			}
			exit;
		}

		$a_materno = $this->euroval->run('Apellido Materno',trim($_POST['a_materno']),array('required','alphabetic'));
		if(is_array($a_materno)){
			foreach ($a_materno as $value) {
				throw new Exception($value);
			}
			exit;
		}

		$telefono = $this->euroval->run('Telefono',trim($_POST['telefono']),array('required','integer'));
		if(is_array($telefono)){
			foreach ($telefono as $value) {
				throw new Exception($value);
			}
			exit;
		}

		$celular = $this->euroval->run('Celular',$_POST['celular'],array('required','integer'));
		if(is_array($celular)){
			foreach ($celular as $value) {
				throw new Exception($value);
			}
			exit;
		}

		$email = $this->euroval->run('Email',trim($_POST['correo']),array('required','email'));
		if(is_array($email)){
			foreach ($email as $value) {
				throw new Exception($value);
			}
			exit;
		}

        /*VALIDAR FOTOGRAFIA*//*VALIDAR FOTOGRAFIA*//*VALIDAR FOTOGRAFIA*/
        $foto = $this->euroval->run('Fotografia',$_FILES['newfoto'],array('file_validate,1024,image/png|image/jpeg'));
        if(!array_key_exists('name',$foto) && !array_key_exists('type', $foto)){
            foreach($foto as $value){
                throw new Exception($value);
            }
            exit;
        }
		/*OBTENIENDO FOTOGRAFIA ACTUAL*/
		$currentPhoto = $this->model->getPhoto($old_mat);

        if($foto['error'] === 4){
			/* ACTULIZA CON LA ACTUAL FOTO */
            $photo = $currentPhoto['fotografia'];
        }else{
			if($currentPhoto['fotografia'] === 'default.png'){
				$name = $foto['name'];
				$info = pathinfo($name);
				$extension = $info['extension'];
				$procesaNombre = 'urs_'.$matricula.'.'.$extension;
				/* ACTUALIZA CON LA FOTO NUEVA */
				$photo = $procesaNombre;
				$ruta = ROOT .'Views'. DS .'fotografias'. DS . $procesaNombre;
				$upload = @move_uploaded_file($foto['tmp_name'], $ruta);
				if(!$upload){
					throw new Exception($ruta);
					exit;
				}
			}else{
				chmod(ROOT.'Views'.DS.'fotografias'.DS.$currentPhoto['fotografia'],0755);
				unlink(ROOT.'Views'.DS.'fotografias'.DS.$currentPhoto['fotografia']);
				$name = $foto['name'];
				$info = pathinfo($name);
				$extension = $info['extension'];
				$procesaNombre = 'urs_'.$matricula.'.'.$extension;
				/* ACTUALIZA CON LA FOTO NUEVA */
				$photo = $procesaNombre;
				$ruta = ROOT .'Views'. DS .'fotografias'. DS . $procesaNombre;
				$upload =  @move_uploaded_file($foto['tmp_name'], $ruta);
				if(!$upload){
					throw new Exception($ruta);
					exit;
				}
			}
        }

        $datos = array(
			'old_mat' => $old_mat,
            'photo' => $photo,
			'puesto' => $puesto,
			'nombre' => $nombre,
			'a_paterno' => $a_paterno,
			'a_materno' => $a_materno,
			'telefono' => $telefono,
			'celular' => $celular,
			'email' => $email);

		$this->model->updateUser($datos);
		$response = array('msg' => 'Datos Actualizados');
		echo json_encode($response);
    }
}
