<?php

class UsersController extends SiteController
{
    public function showUsers(){
        $users = User::all();
        $this->renderView('Users', $users);
    }

    public function editUser($id){
        $users = User::find([$id]);
        if (is_null($users)) {
        } else {
            $this->renderView('UsersEdit', $users);
        }
    }

    public function updateUser($id){
        $user = User::find([$id]);
        $user->update_attributes($_POST);

        if($user->is_valid()){
            $user->save();
            $this->redirectToRoute('users', 'index');
        } else {
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
                $this->redirectToRoute('users', 'create');
            }
        }
        else{
            $this->redirectToRoute('users','create');
        }

    }

    public function deleteUser($id){
        $user = User::find([$id]);
        if($user->role != 1){
            $user->delete();
            $this->redirectToRoute('users', 'index');
        }
        else{
            $this->redirectToRoute('users', 'index');
        }
    }
}