<?php
    class LoginController extends SiteController{
        public function __construct(){
            session_start();
        }

        public function login($user, $password){
            require_once './models/Auth.php';
            $auth = new Auth();
            $auth->checkAuth($user,$password);
            if($auth->checkAuth ($user,$password) == true){
                $this->redirectToRoute('site', 'index');
            }
            else
                $this->redirectToRoute('login', 'index');
        }

        public function logout(){
            if(isset($_SESSION['username'])){
                session_destroy();
                $this->redirectToRoute('login', 'index');
            }
            else
                echo 'nao existe session';
                //$this->redirectToRoute('login', 'index');
        }
    }
