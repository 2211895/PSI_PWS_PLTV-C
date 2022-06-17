<?php
$faturaAtual = $params;
$empresa = Empresa::find([1]);
$produtos = Produto::all();
$linhasFatura = Linhafatura::all();
$valorTotal = 0;

?><!--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" media="all">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
!-->
<script src="public/js/FaturasEdit.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="public/css/Edit.css">
<div id="content" style="width: 60%; padding-left: 10vh">
<?php if($faturaAtual->valortotal > 0 ){?>
    <div class="col-sm-12">
        <table class="table tablestriped"><thead>
            <th><h3>Produtos Adicionados:</h3></th>
            <th><h3>Quantidade</h3></th>
            <th><h3>Valor Unitário</h3></th>
            <th><h3>Valor Iva</h3></th>
            <th><h3>Valor Total</h3></th>
            <th><h3>Ações</h3></th>
            <tbody>
            <?php foreach ($linhasFatura as $linhaFatura){
                if($linhaFatura->fatura_id == $faturaAtual->id){
                    $produtoAtual = Produto::find([$linhaFatura->produto_id]);
                    $valorLinhaAtual = $linhaFatura->quantidade * ($linhaFatura->valorunitario + $linhaFatura->valoriva);
                    $valorTotal+= $valorLinhaAtual;
                    ?>
                    <tr style="box-shadow: 13px 4px 15px -6px rgba(0,0,0,0.68);">
                        <td><?=$produtoAtual->descricao?></td>
                        <td><?=$linhaFatura->quantidade?></td>
                        <td><?=number_format($linhaFatura->valorunitario, 2)?>€</td>
                        <td><?=number_format($linhaFatura->valoriva, 2)?>€</td>
                        <td><?=number_format($valorLinhaAtual, 2)?>€</td>
                        <td><a href="router.php?c=linhasfatura&a=remove&id=<?=$linhaFatura->id ?>"
                               class="btn btn-info" role="button"><i class='fa-solid fa-trash-can' style='color: black'></i></a></td>
                    </tr>

                <?php }
            }?>
            </tbody>
        </table>
    </div>
<?php }
if($valorTotal>0){?>
    <div>
        <h2>Valor a pagar:</h2>
        <a><?=number_format($valorTotal, 2 )?>€</a>
    </div>
<?php }?>



<h2>Escolha o produto a adicionar:</h2>
<input type="text" id="produto" onkeyup="procurarProduto()" placeholder="Insira o Produto">
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped" id="tabela"><thead>
            <th ><h3>Id</h3></th>
            <th><h3>Referencia</h3></th>
            <th><h3>Descrição</h3></th>
            <th><h3>Preço</h3></th>
            <th><h3>Stock</h3></th>
            <th><h3>Iva</h3></th>
            <th><h3>Preço Total</h3></th>
            <th><h3>Ações</h3></th>
            </thead>
            <tbody>
            <?php foreach ($produtos as $produto) {?>
                <tr style="box-shadow: 13px 4px 15px -6px rgba(0,0,0,0.68);">
                    <td><?=$produto->id?></td>
                    <td><?=$produto->referencia?></td>
                    <td><?=$produto->descricao?></td>
                    <td><?=number_format($produto->preco, 2)?>€</td>
                    <td><?=$produto->stock?></td>
                    <td><?=$produto->iva->descricao?>  <?=$produto->iva->percentagem?>%</td>
                    <td><?=number_format($produto->preco + $produto->preco*($produto->iva->percentagem/100), 2)?>€</td>
                    <td>
                        <?php if($produto->stock >0){?>
                            <form action="router.php?c=linhasfatura&a=store&idProduto=<?=$produto->id?>&idFatura=<?=$faturaAtual->id?>" method="post">
                                <label>Quantidade:</label>
                                <input type='number' min="0" max="<?=$produto->stock?>" name='quantidade' value="">
                                <button type="submit" class="btn btn-info" id="selecionar">Selecionar</button>
                            </form>
                        <?php }
                        else{
                            echo "<a>Fora de Stock</a>";
                        } ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <p>
            <a href="router.php?c=faturas&a=terminar&id=<?=$faturaAtual->id?>" class="btn btn-info"
               role="button">Terminar fatura</a>
            <a href="router.php?c=site&a=index" class="btn btn-info"
               role="button">Guardar como rascunho</a>
            <a href="router.php?c=faturas&a=index" class="btn btn-info"
               role="button">Lista de faturas</a>
            <a href="router.php?c=faturas&a=delete&id=<?=$faturaAtual->id?>" class="btn btn-danger"
               role="button">Cancelar fatura</a>
        </p>
    </div>
</div>
</div>


