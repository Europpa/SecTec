<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sessiones
 *
 * @author Europpa
 */
class Sessiones {   
    
    public static function construir_session() {
        session_start();
    }
    
    public static function verificar_seteo($key) {
        if (isset($_SESSION[$key])) {
            return true;
        }
        return false;
    }
    
    public static function set_var($data) {
        foreach($data as $key => $value){
            $_SESSION[$key] = $value;
        }
    }
    
    public static function get_var($key) {
        if (self::verificar_seteo($key)) {
            return $_SESSION[$key];
        }
        return null;
    }
    
    public static function delete_var($key) {
        if (self::verificar_seteo($key)) {
            unset($_SESSION[$key]);
        }
    }
    
    public static function destruir_session() {
        session_destroy();
        header('Location:'.BASE_URL);
    }
    
    public static function autenticado(){
        if(!Sessiones::get_var('autenticado')){
            header('Location:'.BASE_URL);
            exit;
        }
        return true;
    }
    
    public static function accessoView($rango){
        if(!Sessiones::get_var('autenticado')){
            return false;
        }
        if(self::get_var('id_rango') != self::rangos($rango)){
            return false;
        }   
        return true;
    }
    
    public static function accesso($rango){
        if(!Sessiones::get_var('autenticado')){
            header('Location:'.BASE_URL);
            exit;
        }
        if(self::get_var('rango') != self::rangos($rango)){
            header('Location:'.BASE_URL.'error'.DS.'access'.DS.'404');
            exit;
        }   
    }
    
    public static function rangos($rango){
        $role['admin'] = 1;
        $role['profesor'] = 2;
        if(!array_key_exists($rango, $role)){
            throw new Exception('Error de accesso');
        }else{
            return $role[$rango];
        }
    }
    
}
