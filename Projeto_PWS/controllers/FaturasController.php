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
        $fatura = new Fatura(array('data'=> date('Y-m-d H:i:s'), 'valortotal'=>0, 'ivatotal'=>0, 'estado'=>0,'cliente_id'=>$idCliente,'funcionario_id'=>$_SESSION['userId'])); //estado = 0 esta em lançameto
        $fatura->save();
        header("location: router.php?c=faturas&a=edit&id=$fatura->id");
    }
    public function editFatura($idFatura){
        $fatura = Fatura::find([$idFatura]);
        $this->renderView("FaturasEdit", $fatura);
    }
    public function terminarFatura($idFatura){
        $fatura = Fatura::find([$idFatura]);
        $fatura->update_attribute("estado", 1);
        $this->redirectToRoute('site', 'index');
    }

    public function detailsFatura($idFatura){
        $fatura = Fatura::find([$idFatura]);
        $this->renderView("FaturasDetails", $fatura);
    }

    public function showFaturasCliente($idCliente){
        $faturas = Fatura::all();
        $this->renderView2Params("FaturasCliente", $idCliente, $faturas);
    }

    public function imprimirFatura($idFatura){
        $fatura = Fatura::find([$idFatura]);
        if($fatura->cliente_id == $_SESSION['userId'] || $_SESSION['role']!=3){
            require_once "./views/site/FaturaImprimir.php";
        }
    }

    public function deleteFatura($idFatura){
        $fatura = Fatura::find([$idFatura]);
        if($_SESSION['role']!=3){
            $linhasFatura = Linhafatura::all();
            foreach ($linhasFatura as $linhaFatura){
                if($linhaFatura->fatura_id==$fatura->id){
                    $linhaFatura->delete();
                }
            }
            $fatura->delete();
            $this->redirectToRoute("site", "index");
        }
    }
}