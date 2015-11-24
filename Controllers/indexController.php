<?php
class indexController extends BaseController{
	// Variable para manejar el modelo que diste de alta
	private $model;
	
    public function __construct() {
        parent::__construct();
        //Cargar modelo 
        $this->model = $this->loadModel('login');
    }
    public function index(){
        $this->_View->render('index');
    }
    public function login(){
        
    }    

}