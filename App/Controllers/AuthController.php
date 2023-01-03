<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action{

    public function autenticar(){

        $usuario = Container::getModel('usuario');
        
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);

        $autenticado = $usuario->autenticar();

        if(!empty($autenticado->__get('id')) && !empty($autenticado->__get('nome'))){

            session_start();
            $_SESSION['id'] = $autenticado->__get('id');
            $_SESSION['nome'] = $autenticado->__get('nome');

            header('Location: /timeline');

        }else{
            header('Location: /?login=erro');
        }
        
    }

}

?>
