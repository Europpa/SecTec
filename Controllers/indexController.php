<?php
class indexController extends BaseController{
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
        $this->_View->render('index');
    }
    public function login(){
        //$this->_View->render('index');
        $this->_View->data = $_POST;
        if(isset($_POST['adminmat'])){
            $_POST['adminmat'];
        }else{
            $this->_View->render('index');
            exit;
        }
        if(isset($_POST['adminpass'])){
            $_POST['adminpass'];
        }else{
            $this->_View->render('index');
            exit;
        }

        $matricula = $this->euroval->run('Matricula',$_POST['adminmat'],array('required','alpha_numeric'));
        if(is_array($matricula)){
            foreach ($matricula as $value) {
                $this->_View->response = $value;    
            }
            $this->_View->render('index');
            exit;
        }
        $password = $this->euroval->run('Password',$_POST['adminpass'],array('required','alpha_numeric')); 
        if(is_array($password)){
            foreach ($password as $value) {
                $this->_View->response = $value;    
            }
            $this->_View->render('index');
            exit;
        }
        $datos = array(
            'matricula' => $matricula,
            'password' => $password);

        /*verificar si es la primera ves en el sistema*/
        $inicio = $this->model->verificar($datos);
        if($inicio != 0){
            //$this->model->login(); /*verifica datos*/ 
           $this->_View->response = "#logeado exitosamente";
           $this->_View->render('index');
        }else{
           $this->redirect('cambiarpassword');
        }
    }    

}