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
            exit;
        }
        if(!isset($_POST['adminpass'])){
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
            Sessiones::construir_session();
            Sessiones::set_var($usuario);
        }

        //$this->_View->render('login');
    }    

    public function changePass(){
        Sessiones::construir_session();
        Sessiones::autenticado();
        $this->_View->foto = Sessiones::get_var('photo');
        $this->_View->matricula = Sessiones::get_var('matricula');
        $this->_View->nombre = Sessiones::get_var('name').' '.Sessiones::get_var('lastnameF').' '.Sessiones::get_var('lastnameM');
        $this->_View->rango = Sessiones::get_var('rango'); 
        $this->_View->render('cambiarpassword');
    }

    public function cerrarSession(){
        Sessiones::construir_session();
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