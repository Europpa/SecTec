<?php
/**
 * Created by PhpStorm.
 * User: Europpa
 * Date: 24/10/14
 * Time: 07:13 PM
 */

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);	
header ('Content-type: text/html; charset=utf-8');

//echo print_r(get_required_files());
try{
    require_once APP_PATH . 'config.php';
    require_once APP_PATH . 'Request.php';
    require_once APP_PATH . 'Controller.php';
    require_once APP_PATH . 'Dispatcher.php';
    require_once APP_PATH . 'View.php';
    require_once APP_PATH . 'Model.php';
    require_once APP_PATH . 'Database.php';
    require_once APP_PATH . 'Sessiones.php';
    Sessiones::construir_session();
    Dispatcher::run(new Request());
}catch (Exception $e){
    echo $e->getMessage();
}
