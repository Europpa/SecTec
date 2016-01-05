<?php
class gruposModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function getTop5(){
        $query = 'SELECT *
                FROM grupo gp
                ORDER BY gp.id_grupo DESC LIMIT 5';
        $resultado = $this->query($query);
        return $resultado->fetchAll();
    }
    public function getallGrupos(){
        $query = 'SELECT * FROM grupo gp ORDER BY gp.id_grupo DESC';
        $resultado = $this->query($query);
        return $resultado->fetchAll();
    }
    public function getGrupo($dato){
        $data = array(':id' => $dato);
        $query = 'SELECT * FROM grupo WHERE id_grupo = :id';
        $res = $this->query($query,$data);
        return $res->fetch();
    }
    public function altaGrupo($datos){
        $data = array(
            ':grado' => $datos['grado'],
            ':grupo' => $datos['grupo'],
            'turno' => $datos['turno']);
        $query = 'INSERT INTO grupo (grado,nom_grupo,turno) VALUES (:grado,:grupo,:turno)';
        $this->query($query,$data);
        return true;
    }
    public function existeGrupo($datos){
        $data = array(
            ':grado' => $datos['grado'],
            ':grupo' => $datos['grupo'],
            'turno' => $datos['turno']);
        $query = 'SELECT * FROM grupo WHERE grado = :grado AND nom_grupo = :grupo AND turno = :turno';
        $res = $this->query($query,$data);
        if($res->rowCount() >= 1){
            return true;
        }
    }
    public function updateGroup($datos){
        $data = array(
            ':id' => $datos['id'],
            ':grado' => $datos['grado'],
            ':grupo' => $datos['grupo'],
            'turno' => $datos['turno']);
        $query = 'UPDATE grupo SET
        grado = :grado,
        nom_grupo = :grupo,
        turno = :turno WHERE id_grupo = :id';
        $res = $this->query($query,$data);
        return true;
    }

}
