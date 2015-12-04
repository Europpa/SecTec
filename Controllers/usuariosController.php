<?php 
class usuariosController extends BaseController{
	public function __construct(){
		parent::__construct();
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
}
