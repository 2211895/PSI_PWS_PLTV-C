<?php

class LinhasFaturaController extends SiteController
{
    public function storeLinhaFatura($idProduto, $idFatura)
    {
        $produtoAtual = Produto::find([$idProduto]);
        $produtoAtual->update_attribute("stock", $produtoAtual->stock - $_POST['quantidade']);
        $valorUnitario = $produtoAtual->preco;
        $ivaAtual = Iva::find([$produtoAtual->iva_id]);
        $valorIva = round($produtoAtual->preco * ($ivaAtual->percentagem/100),2);
        $linhaFatura = new Linhafatura(array('quantidade'=>$_POST['quantidade'], 'valorunitario'=>$valorUnitario, 'valoriva'=>$valorIva, 'produto_id'=>$idProduto, 'fatura_id'=>$idFatura));
        $linhaFatura->save();
        $faturaAtual = Fatura::find($idFatura);
        $valorTotal = $faturaAtual->valortotal + ($linhaFatura->quantidade * ($valorUnitario+$valorIva));
        $faturaAtual->update_attribute("valortotal", $valorTotal);
        $ivaTotal = $faturaAtual->ivatotal + ($linhaFatura->quantidade * $valorIva);
        $faturaAtual->update_attribute("ivatotal", $ivaTotal);
        header("location: router.php?c=faturas&a=edit&id=$idFatura");
    }

    public function removeLinhaFatura($idLinhaFatura){
        $linhaFaturaAtual = Linhafatura::find([$idLinhaFatura]);
        $produtoAtual = Produto::find([$linhaFaturaAtual->produto_id]);
        $produtoAtual->update_attribute("stock", $produtoAtual->stock + $linhaFaturaAtual->quantidade);
        $faturaAtual = Fatura::find([$linhaFaturaAtual->fatura_id]);
        $valorTotal = $linhaFaturaAtual->quantidade * ($linhaFaturaAtual->valorunitario + $linhaFaturaAtual->valoriva);
        $valorIva = $linhaFaturaAtual->quantidade * $linhaFaturaAtual->valoriva;
        $faturaAtual->update_attribute("valortotal", $faturaAtual->valortotal - $valorTotal);
        $faturaAtual->update_attribute("ivatotal", $faturaAtual->ivatotal - $valorIva);
        $idFatura = $linhaFaturaAtual->fatura_id;
        $linhaFaturaAtual->delete();
        header("location: router.php?c=faturas&a=edit&id=$idFatura");
    }
}