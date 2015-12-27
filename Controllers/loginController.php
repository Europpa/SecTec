<?php
class loginController extends BaseController{
	// Variable para manejar el modelo que diste de alta
	private $model;

    public function __construct() {
        parent::__construct();
        //Cargar modelo
        $this->getLibrary('EuroVal');
        $this->euroval = new EUROVAL();
        $this->model = $this->loadModel('login');
    }
    public function index(){
        $this->_View->render('login');

    }
    public function acceso(){

        if(!isset($_POST['adminmat'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
        if(!isset($_POST['adminpass'])){
            throw new Exception("Datos incorrectos");
            exit;
        }

        $matricula = $this->euroval->run('Matricula',$_POST['adminmat'],array('required','alpha_numeric'));
        if(is_array($matricula)){
            foreach ($matricula as $value){
                throw new Exception($value);
            }
            exit;
        }

        $password = $this->euroval->run('Password',$_POST['adminpass'],array('required','alpha_numeric'));
        if(is_array($password)){
            foreach ($password as $value){
                throw new Exception($value);
            }
            exit;
        }

        $datos = array(
            'matricula' => $matricula,
            'password' => $password);

        $usuario = $this->model->login($datos);

        if(!$usuario){
            throw new Exception('Su matricula o la contraseña son incorrectas');
        }else{
            if($usuario['passwordStatus'] != 0){
                $response = array(
                    'msg' => 'Bienvenido al sistema :D',
                    'status' => 'home',
                    'url' => 'home'
                    );
                echo json_encode($response);
            }else{

                $response = array(
                    'msg' => 'Bienvenido al sistema :D',
                    'status' => 'changepass',
                    'url' => 'login/changePass'
                    );
                echo json_encode($response);
            }
            Sessiones::set_var($usuario);
        }

        //$this->_View->render('login');
    }

    public function changePass(){
        Sessiones::autenticado();
        $srcPhoto = PHOTOS . Sessiones::get_var('photo');
        $this->_View->foto = $srcPhoto;
        $this->_View->matricula = Sessiones::get_var('matricula');
        $this->_View->nick = Sessiones::get_var('name');
        $this->_View->nombre = Sessiones::get_var('name').' '.Sessiones::get_var('lastnameF').' '.Sessiones::get_var('lastnameM');
        $this->_View->rango = Sessiones::get_var('rango');
        $this->_View->render('cambiarpassword');


    }
    public function verificarPass(){
        if(!isset($_POST['pass'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
        if(!isset($_POST['Cpass'])){
            throw new Exception("Datos incorrectos");
            exit;
        }

        $pass = $this->euroval->run('Password',$_POST['pass'],array('required'));
        if(is_array($pass)){
            foreach ($pass as $value){
                throw new Exception($value);
            }
            exit;
        }

        $Cpass = $this->euroval->run('Confirmación',$_POST['Cpass'],array('required'));
        if(is_array($Cpass)){
            foreach ($Cpass as $value){
                throw new Exception($value);
            }
            exit;
        }

        if ($_POST['pass'] !== $_POST['Cpass']) {
            throw new Exception("La contraseña debe ser identica");
            exit;
        }

        $usuario = Sessiones::get_var('id_user');
        $matricula = Sessiones::get_var('matricula');

        $data = array(
            'pass' => $pass,
            'Cpass' => $Cpass,
            'user' => $usuario,
            'matricula' => $matricula);

        $res = $this->model->cambiarPassword($data);
        if(!$res){
            throw new Exception("Error inesperado contacte al administrador");
            exit;
        }
        $status = array('status' => 'Se ha cambiado su contraseña');
        echo json_encode($status);
    }

    public function cerrarSession(){
        Sessiones::delete_var('id_user');
        Sessiones::delete_var('matricula');
        Sessiones::delete_var('passwordStatus');
        Sessiones::delete_var('name');
        Sessiones::delete_var('lastnameF');
        Sessiones::delete_var('lastnameM');
        Sessiones::delete_var('photo');
        Sessiones::delete_var('rango');
        Sessiones::delete_var('autenticado');
        Sessiones::destruir_session();
    }

}
