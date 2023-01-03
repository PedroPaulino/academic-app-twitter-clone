<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{

    public function timeline(){

        session_start();

        if( !empty($_SESSION['id'] && $_SESSION['nome'])){

            $this->render('timeline','layout');

        }else{

            header('Location: /?login=erro');
            
        }

    }

    public function sair(){

        session_start();
        session_destroy();

        header('Location: /');
    }
}


?>