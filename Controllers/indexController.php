<?php
class indexController extends BaseController{
	// Variable para manejar el modelo que diste de alta
	private $model;
	
    public function __construct() {
        parent::__construct();
        //Cargar modelo 
        //$this->model = $this->loadModel('usuarios');
    }
    public function index(){
        $this->_View->render('index');
        /*
        try {
            $con = new Database();
            $this->_View->mensaje = 'Existe una conexión'; 
        }catch(PDOException $e){
            $this->_View->mensaje = $e->getMessage();
        }

        if(!function_exists('apache_get_modules')){
            $this->_View->modulos = 'La extension de verificacion no esta instala en el servidor';
            $this->_View->render('index');
            exit;      
        }else{
            if(in_array('mod_rewrite',apache_get_modules())){
                $this->_View->apache = apache_get_version();
                $this->_View->mod_rw = 'Extension disponible';
            }
            else{
                $this->_View->apache = apache_get_version();
                $this->_View->mod_rw = 'La extension no esta disponible';
            }
        }
        $this->_View->render('index'); 
        */
    }    

}