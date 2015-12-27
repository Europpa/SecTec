<?php
/**
 * Created by PhpStorm.
 * User: Europpa
 * Date: 24/10/14
 * Time: 07:37 PM
 */


class Request {
    private $_Controller;
    private $_Method;
    private $_Args;

    public function __construct(){
        if(isset($_GET['url'])){
            $url = filter_input(INPUT_GET,'url', FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            $url = array_filter($url);

            $this->_Controller = array_shift($url);
            $this->_Method = array_shift($url);
            $this->_Args = $url;
        }

        if(!$this->_Controller){
           $this->_Controller = DEFAULT_CONTROLLER;
        }

        if(!$this->_Method){
            $this->_Method = 'index';
        }

        if(!isset($this->_Args)){
            $this->_Args = array();
        }
    }

    public function getController(){
        return $this->_Controller;
    }

    public function getMethod(){
        return $this->_Method;
    }

    public function getArgs(){
        return $this->_Args;
    }

}
