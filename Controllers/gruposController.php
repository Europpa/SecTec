<?php
class gruposController extends BaseController{
    private $model;
    public function __construct(){
        parent::__construct();
        $this->model = $this->loadModel('grupos');
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
        $this->_View->render('grupos');
    }

    public function top5(){
        $a = array(
        /*    array(
                'id_grupo' => 1,
                'grado' => 3,
                'grupo' => 'B',
                'turno' => 'Vespertino',
                'ciclo_escolar' => '2015/01')*/
        );
        $datos = $this->model->getTop5();
        echo json_encode($datos);
    }

    public function listaGrupos(){
        Sessiones::autenticado();
        $srcPhoto = PHOTOS . Sessiones::get_var('photo');
        $this->_View->foto = $srcPhoto;
        $this->_View->matricula = Sessiones::get_var('matricula');
        $this->_View->nick = Sessiones::get_var('name');
        $this->_View->nombre = Sessiones::get_var('name').' '.Sessiones::get_var('lastnameF').' '.Sessiones::get_var('lastnameM');
        $this->_View->rango = Sessiones::get_var('rango');
        $this->_View->render('listaGrupos');
    }
    public function allGrupos(){
        $datos = $this->model->getallGrupos();
        echo json_encode($datos);
    }
    public function altaGrupos(){
        Sessiones::autenticado();
        $srcPhoto = PHOTOS . Sessiones::get_var('photo');
        $this->_View->foto = $srcPhoto;
        $this->_View->matricula = Sessiones::get_var('matricula');
        $this->_View->nick = Sessiones::get_var('name');
        $this->_View->nombre = Sessiones::get_var('name').' '.Sessiones::get_var('lastnameF').' '.Sessiones::get_var('lastnameM');
        $this->_View->rango = Sessiones::get_var('rango');
        $this->_View->render('altaGrupos');
    }
    public function guardarGrupo(){
        if(!isset($_POST['grado'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
        if(!isset($_POST['grupo'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
        if(!isset($_POST['turno'])){
            throw new Exception("Datos incorrectos");
            exit;
        }

        $grado = $this->euroval->run('Grado',trim($_POST['grado']),array('required','integer','max_len,1'));
        if(is_array($grado)){
            foreach ($grado as $value) {
                throw new Exception($value);
            }
            exit;
        }
        $listaGrados = array(1,2,3);
        if(!in_array($grado,$listaGrados)){
            throw new Exception("Dato no permitido");

        }

        $grupo = $this->euroval->run('Grupo',strtoupper(trim($_POST['grupo'])),array('required','alphabetic','max_len,1'));
        if(is_array($grupo)){
            foreach ($grupo as $value) {
                throw new Exception($value);
            }
            exit;
        }
        $listaGrupos = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O');
        if(!in_array($grupo,$listaGrupos)){
            throw new Exception("Dato no permitido");

        }

        $turno = $this->euroval->run('Turno',strtoupper(trim($_POST['turno'])),array('required','alphabetic','max_len,1'));
        if(is_array($turno)){
            foreach ($turno as $value) {
                throw new Exception($value);
            }
            exit;
        }
        $listaTurnos = array('M','V');
        if(!in_array($turno,$listaTurnos)){
            throw new Exception("Dato no permitido");
        }

        $data = array(
            'grado'=>$grado,
            'grupo'=>$grupo,
            'turno'=>$turno);
        if($this->model->existeGrupo($data)){
            throw new Exception("El grupo ya existe");
        }else{
            $res = $this->model->altaGrupo($data);
            if($res){
                $status = array('msg' => 'Datos guardados');
                echo json_encode($status);
            }else{
                throw new Exception("Ocurrio algun error contacte con el administrador");
            }
        }
    }

    public function getGrupo(){
        $id = $this->euroval->run('id',$_GET['id'],array(),array('filter_numbers'));
        $res = $this->model->getGrupo($id);
        echo json_encode($res);

    }
    public function updateGrupo(){
        if(!isset($_POST['id'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
        if(!isset($_POST['grado'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
        if(!isset($_POST['grupo'])){
            throw new Exception("Datos incorrectos");
            exit;
        }
        if(!isset($_POST['turno'])){
            throw new Exception("Datos incorrectos");
            exit;
        }

        $id = $this->euroval->run('Id',trim($_POST['id']),array('required','integer'));
        if(is_array($id)){
            foreach ($id as $value) {
                throw new Exception($value);
            }
            exit;
        }

        $grado = $this->euroval->run('Grado',trim($_POST['grado']),array('required','integer','max_len,1'));
        if(is_array($grado)){
            foreach ($grado as $value) {
                throw new Exception($value);
            }
            exit;
        }
        $listaGrados = array(1,2,3);
        if(!in_array($grado,$listaGrados)){
            throw new Exception("Dato no permitido");

        }

        $grupo = $this->euroval->run('Grupo',strtoupper(trim($_POST['grupo'])),array('required','alphabetic','max_len,1'));
        if(is_array($grupo)){
            foreach ($grupo as $value) {
                throw new Exception($value);
            }
            exit;
        }
        $listaGrupos = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O');
        if(!in_array($grupo,$listaGrupos)){
            throw new Exception("Dato no permitido");

        }

        $turno = $this->euroval->run('Turno',strtoupper(trim($_POST['turno'])),array('required','alphabetic','max_len,1'));
        if(is_array($turno)){
            foreach ($turno as $value) {
                throw new Exception($value);
            }
            exit;
        }
        $listaTurnos = array('M','V');
        if(!in_array($turno,$listaTurnos)){
            throw new Exception("Dato no permitido");
        }

        $data = array(
            'id'=>$id,
            'grado'=>$grado,
            'grupo'=>$grupo,
            'turno'=>$turno);

        if($this->model->existeGrupo($data)){
            throw new Exception("El grupo ya existe");
        }else{
            $res = $this->model->updateGroup($data);
            if($res){
                $status = array('msg' => 'Datos guardados');
                echo json_encode($status);
            }else{
                throw new Exception("Ocurrio algun error contacte con el administrador");
            }
        }
    }
}
