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
        if(!empty($_POST['referencia'])&&!empty($_POST['descricao'])&&!empty($_POST['preco'])&&!empty($_POST['stock'])&&!empty($_POST['iva_id'])){
            $produto = new Produto($_POST);
            if($produto->is_valid()){
                $produto->save();
                $this->redirectToRoute('produtos','index');
            }
            else{
                //DA ERRO  POP UP
                $this->redirectToRoute('produtos', 'create');
            }
        }
        else{
            //DA ERRO POP UP
            $this->redirectToRoute('produtos','create');
        }

    }

    public function deleteProduto($id){
        $produto = Produto::find([$id]);
        $produto->delete();
        $this->redirectToRoute('produtos', 'index');
    }
}