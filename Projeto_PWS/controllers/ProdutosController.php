<?php

class ProdutosController extends SiteController
{
    public function showProdutos(){
        $produtos = Produto::all();
        $this->renderView('Produtos', $produtos);
    }

    public function editProduto($id){
        $produto = Produto::find([$id]);
        if (is_null($produto)) {
        } else {
            $this->renderView('ProdutosEdit', $produto);
        }
    }

    public function updateProduto($id){
        $produto = Produto::find([$id]);
        $produto->update_attributes($_POST);

        if($produto->is_valid()){
            $produto->save();
            $this->redirectToRoute('produtos', 'index');
        } else {
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
                $this->redirectToRoute('produtos', 'create');
            }
        }
        else{
            $this->redirectToRoute('produtos','create');
        }

    }

    public function deleteProduto($id){
        $produto = Produto::find([$id]);
        $produto->delete();
        $this->redirectToRoute('produtos', 'index');
    }
}