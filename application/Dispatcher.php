<?php
/**
 * Created by PhpStorm.
 * User: Europpa
 * Date: 24/10/14
 * Time: 08:23 PM
 */

class Dispatcher{
    public static function run(Request $request){
        $controller = $request->getController() . 'Controller';
        $routeController = ROOT . 'Controllers' . DS . $controller . '.php';
        $method = $request->getMethod();
        $args = $request->getArgs();
        if(is_readable($routeController)){
            require_once $routeController;
            $controller = new $controller;
            if(!is_callable(array($controller,$method))){
                $method = 'index';
            }
            if($args != null){
                call_user_func_array(array($controller,$method),$args);
            }else{
                call_user_func(array($controller,$method));
            }
        } else {
            throw new Exception('no encontrado xD');
        }
    }
}