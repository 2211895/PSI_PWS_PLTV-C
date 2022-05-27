<?php

class IvaController extends SiteController
{
    public function showIvas(){
        $ivas = Iva::all();
        $this->renderView('Ivas', $ivas);
    }

    public function detailsIva($id){

    }

    public function editIva($id){
        $iva = Iva::find([$id]);
        if (is_null($iva)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('IvasEdit', $iva);
        }
    }

    public function updateIva($id){
        $iva = Iva::find([$id]);
        $iva->update_attributes($_POST);

        if($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute('ivas', 'index');
        } else {
            //DA ERRO POP UP
            $this->redirectToRoute('ivas', 'edit');
        }
    }

    public function createIva(){
        $this->renderView('IvasCreate', 0);
    }

    public function storeIva(){
        if(!empty($_POST['percentagem'])&&!empty($_POST['descricao']) && ($_POST['vigor']==0 || $_POST['vigor']==1)){
            $iva = new Iva($_POST);
            if($iva->is_valid()){
                $iva->save();
                $this->redirectToRoute('ivas','index');
            }
            else{
                //DA ERRO  POP UP
                $this->redirectToRoute('ivas', 'create');
            }
        }
        else{
            //DA ERRO POP UP
            $this->redirectToRoute('ivas','create');
        }

    }

    public function deleteIva($id){
        $iva = Iva::find([$id]);
        if($iva->id > 3){
            $iva->delete();
            $this->redirectToRoute('ivas', 'index');
        }
        else{
            //ERRO POP UP
            $this->redirectToRoute('ivas', 'index');
        }
    }
}