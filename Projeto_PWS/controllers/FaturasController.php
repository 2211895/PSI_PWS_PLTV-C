<?php

class FaturasController extends SiteController
{
    public function showFaturas(){
        $faturas = Fatura::all();
        $this->renderView('Faturas', $faturas);
    }

    public function createFatura(){
        $this->renderView('FaturasCreate', 0);
    }
    public function storeFatura($idCliente){
        $fatura = new Fatura(array('data'=> date('Y-m-d H:i:s'), 'valortotal'=>0, 'ivatotal'=>0, 'estado'=>0,'cliente_id'=>$idCliente,'funcionario_id'=>$_SESSION['userId']));
        $fatura->save();
        $this->renderView('LinhasFatura', $fatura);

    }
}