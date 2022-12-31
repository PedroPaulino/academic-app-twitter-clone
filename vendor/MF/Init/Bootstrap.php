<?php

namespace MF\Init;

abstract class Bootstrap{

    private $routes;

    protected abstract function initRoutes();

    public function getRoutes(){
        return $this->routes;
    }

    public function setRoutes($routes){
        $this->routes = $routes;
    }

    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    protected function getUrl(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    protected function run($url){
        //echo $url;

        foreach($this->getRoutes() as $routes => $param){
            /*echo "<pre>"; 
            print_r($param);
            echo"</pre>";
            */
            if($url == $param['route']){
                $class = "App\\Controllers\\".ucfirst($param['controller']);
                $controller = new $class;

                $action = $param['action'];    
                $controller->$action();
            }

        }
    

    }
}
