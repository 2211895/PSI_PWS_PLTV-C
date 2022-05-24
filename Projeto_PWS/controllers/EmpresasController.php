<?php

class EmpresasController extends SiteController
{
    public function showEmpresas(){
        $empresas = Empresa::all();
        $this->renderView('Empresas', $empresas);
    }

    public function detailsEmpresa($id){

    }

    public function editEmpresa($id){
        $empresa = Empresa::find([$id]);
        if (is_null($empresa)){
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            require_once 'views/site/EmpresasEdit.php';
        }
    }

    public function updateEmpresa($id){
        $empresa = Empresa::find([$id]);
        $empresa->update_attributes($_POST);

        if($empresa->is_valid()){
            $empresa->save();
            $this->redirectToRoute('empresas', 'index');
        } else {
            //DA ERRO POP UP
            $this->redirectToRoute('empresas', 'edit');
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