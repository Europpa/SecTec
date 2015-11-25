<?php 
class cambiarpasswordController extends BaseController{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->_View->render('cambiarpassword');	
	}
}
?>