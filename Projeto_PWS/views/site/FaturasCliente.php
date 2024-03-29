<?php
$faturas = $params2;
$idCliente = $params;
if($_SESSION['role']==3){
    $userAtual = $_SESSION['userId'];
}
else{
    $userAtual = $idCliente;
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="public/css/Edit.css">
<div id="content" style="width: 50%; text-align: center">
<h2>As Minhas Faturas:</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped"><thead>
            <th><h3>Id</h3></th>
            <th><h3>Emitida por:</h3></th>
            <th><h3>Estado </h3></th>
            <th><h3>Data </h3></th>
            <th><h3>Iva</h3></th>
            <th><h3>Valor total</h3></th>
            <th><h3>Ações</h3></th></thead>
            <tbody>
            <?php foreach ($faturas as $fatura) {
                if($fatura->cliente_id == $userAtual){
                    $cliente = User::find([$fatura->cliente_id]);
                    $funcionario = User::find([$fatura->funcionario_id]);
                    $linhasFatura = Linhafatura::all();
                    $valorTotal = 0;
                    $ivaTotal = 0;
                    foreach ($linhasFatura as $linhaFatura){
                        if($linhaFatura->fatura_id == $fatura->id){
                            $valorTotal += $linhaFatura->valorunitario + $linhaFatura->valoriva;
                            $ivaTotal += $linhaFatura->valoriva;
                        }
                    }
                    ?>
                    <tr style="box-shadow: 0px 1px 0px 0px #000000;">
                        <td><?=$fatura->id?></td>
                        <td><?=$funcionario->username?> </td>
                        <td><?php   if($fatura->estado == 0){
                                ?>Em lançamento
                            <?php }
                            elseif($fatura->estado == 1){
                                ?>Terminada
                            <?php }?> </td>
                        <td><?=$fatura->data->format('d-m-Y H:i:s')?></td>
                        <td><?=number_format($ivaTotal, 2)?>€</td>
                        <td><?=number_format($valorTotal, 2)?>€</td>
                        <td>
                            <a href="router.php?c=faturas&a=details&id=<?=$fatura->id ?>"
                               class="btn btn-info" role="button"><i class='fa-solid fa-eye' style='color: black'></i></a>
                        </td>
                    </tr>
                    <?php
                }
                 } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6" style="margin-top: 10px">
        <a href="router.php?c=site&a=index" class="btn btn-info"
           role="button"style="background-color: rgba(82,151,255,1);color: white;border-radius: 3px;text-decoration: none;padding: 4px;">Homepage</a>
    </div>
</div>
</div>


