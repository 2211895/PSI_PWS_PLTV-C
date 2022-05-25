<?php

class UsersController extends SiteController
{
    public function showUsers(){
        $users = User::all();
        $this->renderView('Users', $users);
    }

    public function detailsUser($id){

    }

    public function editUser($id){
        $users = User::find([$id]);
        if (is_null($users)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('UsersEdit', $users);
            //require_once 'views/site/UsersEdit.php';
        }
    }

    public function updateUser($id){
        $user = User::find([$id]);
        $user->update_attributes($_POST);

        if($user->is_valid()){
            $user->save();
            $this->redirectToRoute('users', 'index');
        } else {
            //DA ERRO POP UP
            $this->redirectToRoute('users', 'edit');
        }
    }

    public function createUser(){
        $this->renderView('UsersCreate', 0);
    }

    public function storeUser(){
        if(!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['email'])&&!empty($_POST['telefone'])&&!empty($_POST['nif'])&&!empty($_POST['morada'])&&!empty($_POST['codigopostal'])&&!empty($_POST['localidade'])&&!empty($_POST['role'])){
            $user = new User($_POST);
            if($user->is_valid()){
                $user->save();
                $this->redirectToRoute('users','index');
            }
            else{
                //DA ERRO  POP UP
                $this->redirectToRoute('users', 'create');
            }
        }
        else{
            //DA ERRO POP UP
            $this->redirectToRoute('users','create');
        }

    }

    public function deleteUser($id){
        $user = User::find([$id]);
        if($user->role != 1){ //NAO PODE APAGAR CASO SEJA ADMINISTRADOR
            $user->delete();
            $this->redirectToRoute('users', 'index');
        }
        else{
            //ERRO POP UP
            $this->redirectToRoute('users', 'index');
        }
    }
}