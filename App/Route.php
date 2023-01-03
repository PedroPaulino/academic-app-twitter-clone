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

        $routes['registrar'] = array(
            'route' => '/registrar',
            'controller' => 'indexController',
            'action' => 'registrar'
        );

        $routes['autenticar'] = array(
            'route' => '/autenticar',
            'controller' => 'authController',
            'action' => 'autenticar'
        );

        $routes['timeline'] = array(
            'route' => '/timeline',
            'controller' => 'AppController',
            'action' => 'timeline'
        );
        $routes['sair'] = array(
            'route' => '/sair',
            'controller' => 'AppController',
            'action' => 'sair'
        );

        return $this->setRoutes($routes);

    }

 
}
