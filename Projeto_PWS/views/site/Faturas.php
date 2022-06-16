<?php
$faturas = $params;

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="public/js/FaturasCreate.js"></script>

<link rel = "stylesheet" href = "public/css/BarraPesquisa.css" >

<h2>Faturas</h2>
<input type="text" id="Input" onkeyup="barraPesquisa()" placeholder="Search for names..">
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped" id="myTable"><thead>
            <th><h3>Id</h3></th>
            <th><h3>Data</h3></th>
            <th><h3>Valor total</h3></th>
            <th><h3>Iva</h3></th>
            <th><h3>Estado</h3></th>
            <th><h3>Cliente</h3></th>
            <th><h3>Emitida por</h3></th>
            <th><h3>Ações</h3></th></thead>
            <tbody>
            <?php foreach ($faturas as $fatura) {
                $cliente = User::find([$fatura->cliente_id]);
                $funcionario = User::find([$fatura->funcionario_id]);
                ?>
                <tr>
                    <td><?=$fatura->id?></td>
                    <td><?=$fatura->data->format('d-m-Y H:i:s')?></td>
                    <td><?=number_format($fatura->valortotal, 2)?>€</td>
                    <td><?=number_format($fatura->ivatotal, 2)?>€</td>
                    <td><?php   if($fatura->estado == 0){
                                    ?>Em lançamento
                                <?php }
                                elseif($fatura->estado == 1){
                                    ?>Terminada
                                <?php }?></td>
                    <td><?=$cliente->username?></td>
                    <td><?=$funcionario->username?></td>
                    <td>
                        <a href="router.php?c=faturas&a=details&id=<?=$fatura->id ?>"
                           class="btn btn-info" role="button">Detalhes</a>
                        <?php if($fatura->estado==0){
                            echo"<a href='router.php?c=faturas&a=edit&id=$fatura->id'
                                    class='btn btn-info' role='button'>Editar</a>";
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
            <a href="router.php?c=site&a=index" class="btn btn-info"
               role="button">Homepage</a>
    </div>
</div>


