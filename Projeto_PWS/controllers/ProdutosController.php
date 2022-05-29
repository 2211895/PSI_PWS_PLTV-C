<?php

class ProdutosController extends SiteController
{
    public function showProdutos(){
        $produtos = Produto::all();
        $this->renderView('Produtos', $produtos);
    }

    public function detailsUser($id){

    }

    public function editProduto($id){
        $produto = Produto::find([$id]);
        if (is_null($produto)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('ProdutosEdit', $produto);
            //require_once 'views/site/UsersEdit.php';
        }
    }

    public function updateProduto($id){
        $produto = Produto::find([$id]);
        $produto->update_attributes($_POST);

        if($produto->is_valid()){
            $produto->save();
            $this->redirectToRoute('produtos', 'index');
        } else {
            //DA ERRO POP UP
            $this->redirectToRoute('produtos', 'edit');
        }
    }

    public function createProduto(){
        $this->renderView('ProdutosCreate', 0);
    }

    public function storeProduto(){
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

    public function deleteProduto($id){
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