<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of error
 *
 * @author Europpa
 */
class errorController extends BaseController {
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_View->msg = _getError();
        $this->_View->render('error');
    }
    public function access($tipo){       
        $this->_View->msg = $this->_getError($tipo);
        $this->_View->render('error');
    }
    private function _getError($key = 'default'){
        $error['404'] = 'No se ha encontrado lo que buscabas.';
        $error['default'] = 'OPss- ha sucedido algun error :(';
        if(!array_key_exists($key, $error)){
            return $error['default'];
        }
        return $error[$key];
    }
}
