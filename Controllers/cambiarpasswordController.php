<?php 
class cambiarpasswordController extends BaseController{
	private $model;
	public function __construct(){
		parent::__construct();

	}
	public function index(){
		$this->_View->render('cambiarpassword');
		$this->model = $this->loadModel('login');	
	}
	public function changePassword(){
        if(isset($_POST['newpass'])){
            $_POST['newpass'];
        }else{
            $this->_View->render('cambiarpassword');
            exit;
        }
        if(isset($_POST['confirmpass'])){
            $_POST['confirmpass'];
        }else{
            $this->_View->render('cambiarpassword');
            exit;
        }
        $nuevopass = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];
      	if($nuevopass !== $confirmpass){
      		$this->_View->warning = "El password debe ser identico";
      		$this->_View->render('cambiarpassword');	
      		exit;
      	}else{
      		$this->model->cambiarPass();
	      	$this->_View->warning = "#Datos correctos";
			     $this->_View->render('cambiarpassword');		
      	}
	}

}
?>