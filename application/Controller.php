<?php
/**
 * Created by PhpStorm.
 * User: Europpa
 * Date: 24/10/14
 * Time: 08:22 PM
 */

abstract class BaseController{

    protected  $_View;

    public function __construct(){
        $this->_View = new View(new Request);
    }

    abstract public function index();

    protected function loadModel($model){
        $model = $model.'Model';
        $routeModel = ROOT . 'Models'.DS.$model.'.php';
        if(is_readable($routeModel)){
            require_once $routeModel;
            $model = new $model;
            return $model;
        }else{
            throw new Exception('ERROR EN EL MODELO XD');
        }
    }

    protected function getLibrary($lib){
        $routeLibrary = ROOT . 'Libs' . DS . $lib . '.php';
        if(is_readable($routeLibrary)){
            require_once $routeLibrary;
        }else{
            throw new Exception('Error en la libreria');
        }
    }
    
    protected function redirect($ruta = false){
        if($ruta){
            header('location:'.BASE_URL.$ruta);
            exit;
        }else{
            header('Location:'.BASE_URL);
            exit;
        }
    }
    
}

