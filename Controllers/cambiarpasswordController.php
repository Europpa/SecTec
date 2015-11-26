<?php 
class cambiarpasswordController extends BaseController{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->_View->render('cambiarpassword');	
	}
	public function changePassword(){
		$password = $_POST['nowpass'];
		$newpassword = $_POST['newpass'];
		$newpasswordc = $_POST['confirmpass'];
		$this->_View->data = $password;
		$this->_View->render('cambiarpassword');		


	}

}
?>