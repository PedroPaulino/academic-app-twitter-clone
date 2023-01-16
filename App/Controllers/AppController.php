<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{

    public function timeline(){

      

            $this->validaAutenticacao();

            $tweet = Container::getModel('tweet');
            $usuario = Container::getModel('Usuario');

            $tweet->__set('id_usuario', $_SESSION['id']);
            $usuario->__set('id', $_SESSION['id']);

            $this->view->tweets = $tweet->getAll();;

            $this->view->info = $usuario->getInfoUsuario();
            $this->view->totalTweets = $usuario->getTotalTweets();
            $this->view->totalSeguindo = $usuario->getTotalSeguindo();
            $this->view->totalSeguidores = $usuario->getTotalSeguidores();

        

            $this->render('timeline');

      

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

        $pesquisarPor = isset($_GET['pesquisarPor']) ? $_GET['pesquisarPor'] : '';

        $usuarios = array();

        if($pesquisarPor != ''){


            $usuario = Container::getModel('usuario');
            $usuario->__set('nome', $pesquisarPor);
            $usuario->__set('id', $_SESSION['id']);
            $usuarios = $usuario->getAll();
    
        }
               
        $this->view->usuarios = $usuarios;


        $this->render('quemSeguir');
    }

    public function acao(){

        $this->validaAutenticacao();

        $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
        $id_usuario_seguindo = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

        $usuario = Container::getModel('usuario');
        $usuario->__set('id', $_SESSION['id']);

        if($acao == 'seguir'){

            $usuario->seguirUsuario($id_usuario_seguindo);


        }elseif($acao == 'deixar_de_seguir'){

            $usuario->deixarSeguirUsuario($id_usuario_seguindo);

          

        }

        header('Location: /quem_seguir');


    }

    public function remover(){

        $this->validaAutenticacao();

        $tweet_ser_removido = isset($_GET['id_tweet']) ? $_GET['id_tweet'] : '';

        $tweet = Container::getModel('tweet');

        $tweet->__set('id', $tweet_ser_removido);
        $tweet->__set('id_usuario', $_SESSION['id']);

        $tweet->remover();

        header('Location: /timeline');



    
    }



}


?>