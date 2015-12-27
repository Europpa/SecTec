<?php
/**
 * Created by PhpStorm.
 * User: Europpa
 * Date: 24/10/14
 * Time: 08:22 PM
 */
class Model{
    protected $_db;
    public function __construct(){
        $this->_db = new Database();
    }
    public function get_db_con() {
        return $this->_db;
    }

    public function getSql($sql){
        $classSql = $sql.'Sql';
        $routeSql = ROOT . 'Models' .DS. 'Sql' .DS. $classSql.'.php';
        if(is_readable($routeSql)){
            require_once $routeSql;
        }else{
            throw new Exception('No existe el archivo SQL :P');
        }
    }

    public function query($_sql,$_datos = null) {
        $_conx = $this->_db;
        $_conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $_stmt = $_conx->prepare($_sql);
        $_stmt->execute($_datos);
        return $_stmt;
    }

}