<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;



class IndexController extends Action{

    public function index (){
        
        $this->render('index','layout');
    }

    public function inscreverse(){

        $this->view->erroCadastroEmail = false;
        $this->view->erroCadastroPreenchimento = false;

        $this->render('inscreverse','layout');

    }

    public function registrar(){

        $this->view->erroCadastroEmail = false;
        $this->view->erroCadastroPreenchimento = false;
        
        $usuario = Container::getModel('usuario');

        $usuario->__set("nome", $_POST['nome']);
        $usuario->__set("email", $_POST['email']);
        $usuario->__set("senha", $_POST['senha']);

        if($usuario->validarCadastro()){

       
            if(count($usuario->getUsuarioPorEmail()) < 1){

                $usuario->salvar();
                $this->render('cadastro','layout');
                
            }else{

               $this->view->erroCadastroEmail = true;
                
                $this->render('inscreverse','layout');
            }

        }else{

            $this->view->erroCadastroPreenchimento = true;

            $this->render('inscreverse','layout');

        }

    
    


               



        

        
    }




}
?>