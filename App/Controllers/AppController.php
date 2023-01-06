<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{

    public function timeline(){

      

            $this->validaAutenticacao();

            $tweet = Container::getModel('tweet');
            $tweet->__set('id_usuario', $_SESSION['id']);
            $tweets = $tweet->getAll();

            //print_r($tweets);

            $this->view->tweets = $tweets;

            $this->render('timeline','layout');

      

    }

    public function sair(){

        session_start();
        session_destroy();

        header('Location: /');
    }

    public function tweet(){

        $this->validaAutenticacao();

        $tweet = Container::getModel('Tweet');

        $tweet->__set('id_usuario', $_SESSION['id']);
        $tweet->__set('tweet',$_POST['tweet']);

        $tweet->salvar();

        header('Location: /timeline');

        
    }

    public function validaAutenticacao(){
        
        session_start();
        
        if( !isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['nome']) || empty($_SESSION['nome']) ){
            header('Location: /?login=erro');
        }


    }

    public function quemSeguir(){

        $this->validaAutenticacao();
    }



}


?>