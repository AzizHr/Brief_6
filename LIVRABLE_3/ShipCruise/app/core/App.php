<?php


class App {


    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {

        $this->prepareUrl();
        $this->render();

    }

    public function prepareUrl() {

        $url = $_SERVER['QUERY_STRING'];

        if(!empty($url)) {

            $url = trim($url , '/');
            $url = explode('/' , $url);

            $this->controller = isset($url[0]) ? ucwords($url[0]) . 'Controller' : 'HomeController';

            $this->method = isset($url[1]) ? $url[1] : 'index';

            unset($url[0] , $url[1]);

            $this->params = !empty($url) ? array_values($url) : [];

        }

    }

    private function render() {

        if(class_exists($this->controller)) {

            $controller = new $this->controller;

            if(method_exists($controller , $this->method)) {
                call_user_func_array([$controller , $this->method] , $this->params);
            }else {
                echo "Method Not Exists";
            }

        }else {

            echo "This Controller " . $this->controller . " Does't Exist";

        }

    }

}