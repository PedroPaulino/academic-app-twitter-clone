<?php 

namespace App;

use \MF\Init\Bootstrap;

class Route extends Bootstrap{

    // Aqui será definido qual controlador entrará em ação
    protected function initRoutes(){

        $routes['home'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        );

        return $this->setRoutes($routes);

    }

 
}
