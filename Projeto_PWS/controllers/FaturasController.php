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
    public function storeFatura(){
        $fatura = new Fatura(array('data'=> date('Y-m-d H:i'), ));
    }
}