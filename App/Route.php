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

        $routes['inscreverse'] = array(
            'route' => '/inscreverse',
            'controller' => 'indexController',
            'action' => 'inscreverse'
        );

        return $this->setRoutes($routes);

    }

 
}
