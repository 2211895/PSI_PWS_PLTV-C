<?php
$faturaAtual = $params;

$linhasFatura = Linhafatura::all();
$valorTotal = 0;
$funcionario = User::find([$faturaAtual->funcionario_id]);
$cliente = User::find([$faturaAtual->cliente_id]);

?><!--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
!-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="public/css/Edit.css">
<div id="content" style="width: 60%; text-align: center">
<h2>Emitida por:</h2>
<a><?=$funcionario->username?></a>
<h2>Cliente:</h2>
<a><?=$cliente->username?></a>
<div class="col-sm-12">
    <table class="table tablestriped"><thead>
        <th><h3>Produtos Adicionados:</h3></th>
        <th><h3>Quantidade</h3></th>
        <th><h3>Valor Unitário</h3></th>
        <th><h3>Valor Iva</h3></th>
        <th><h3>Valor Total</h3></th>
        <tbody>
<?php foreach ($linhasFatura as $linhaFatura){
    if($linhaFatura->fatura_id == $faturaAtual->id){
        $produtoAtual = Produto::find([$linhaFatura->produto_id]);
        $valorLinhaAtual = $linhaFatura->quantidade * ($linhaFatura->valorunitario + $linhaFatura->valoriva);
        $valorTotal+= $valorLinhaAtual;
        ?>
        <tr style="box-shadow: 0px 1px 0px 0px #000000;">
            <td><?=$produtoAtual->descricao?></td>
            <td><?=$linhaFatura->quantidade?></td>
            <td><?=number_format($linhaFatura->valorunitario, 2)?>€</td>
            <td><?=number_format($linhaFatura->valoriva, 2)?>€</td>
            <td><?=number_format($valorLinhaAtual, 2)?>€</td>
        </tr>
    <?php }
}?>
        </tbody>
    </table>
</div>
<div>
    <div>
        <h2>Valor a pagar:</h2>
        <a><?=$valorTotal?>€</a>
    </div>
    <div class="col-sm-6">
        <p>
            <?php if($_SESSION['role']!=3){
                echo"<a href='router.php?c=faturas&a=index' class='btn btn-info'
               role='button'>Voltar às faturas</a>";
            }
            else{
                echo"<a href='router.php?c=faturas&a=cliente&id=". $_SESSION["role"] . "' class='btn btn-info'
               role='button'>Voltar às faturas</a>";
            }
            ?>
            <a href="router.php?c=faturas&a=imprimir&id=<?=$faturaAtual->id?>" target="_blank" class="btn btn-info" role="button">Imprimir</a>
        </p>
    </div>
</div>
</div>

