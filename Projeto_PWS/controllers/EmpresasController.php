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
            $this->renderView('EmpresasEdit', $empresa);
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
}