<?php
/**
 * Created by PhpStorm.
 * User: Europpa
 * Date: 24/10/14
 * Time: 08:22 PM
 */

class View{
    private $_controlador;
    private $_js;
    private $_css;
    

    public function __construct(Request $peticion){
        $this->_controlador = $peticion->getController();
        $this->_css = array();
        $this->_js = array();
    }

    public function render($view, $item = false){
        
        $srcView = ROOT . 'Views' . DS . $this->_controlador . DS. $view . '.php';
        /* ESTABLECER UN MENU PREDETERMINADO */
        /*$menu = array(
           array(
               'id' => 'inicio',
               'titulo' => 'Inicio',
               'enlace' => BASE_URL
           ),
            array(
                'id' => 'usuarios',
                'titulo' => 'Usuarios',
                'enlace' => BASE_URL .'posts'
            )
            array(
                'id' => 'registrar',
                'titulo' => 'Registrar',
                'enlace' => BASE_URL . 'registro'
            )
        );*/
        $css = array();
        $js = array();
        if(count($this->_css)){
            $css =  $this->_css;
        }
        if(count($this->_js)){
            $js =  $this->_js;
        }
        
        $layoutParams = [
            'css' => $css,
            'js' => $js
                ];
      
        if(is_readable($srcView)){
            //require_once ROOT . 'Views' . DS . 'layout' . DS . 'header.php';
            require_once $srcView;
            //require_once ROOT . 'Views' . DS . 'layout' . DS . 'footer.php';
        }else{
            throw new Exception('Error en la vista');
        }
    }
    
    public function setCSS(array $css){
        if(is_array($css) && count($css)){
            foreach($css as $tag){
                $this->_css[] = BASE_URL . 'Views' . DS . 'css' . DS . $tag . '.css';
            }
        }else{
            throw new Exception('Error en el css');
        }
    }
    public function setJS(array $js){
        if(is_array($js) && count($js)){
            foreach($js as $tag){
                $this->_js[] =  BASE_URL . 'Views' . DS . 'js' . DS . $tag . '.js';
            }
        }else{
            throw new Exception('Error al cargar el js');
        }
    }
}