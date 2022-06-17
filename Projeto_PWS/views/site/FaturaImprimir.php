<?php
$faturaAtual = $fatura;
$empresa = Empresa::find([1]);
$linhasFatura = Linhafatura::all();
$valorTotal = 0;
$valorSemIva = 0;
$valorIva = 0;
$funcionario = User::find([$faturaAtual->funcionario_id]);
$cliente = User::find([$faturaAtual->cliente_id]);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<div id="print">
    <link rel = "stylesheet" href = "public/css/FaturasImprimir.css" media="print">
    <img src="public/img/LogoPretoBranco.png" alt="Logo" style="width:321px;height:65px;">
    <div class="row">
        <div class="column">
            <h2>Empresa:</h2>
            <a><?=$empresa->designacao?><br></a>
            <a>Morada: <?=$empresa->morada?>, <br> <?=$empresa->localidade?> <?=$empresa->codpostal?><br></a>
            <a>Email: <?=$empresa->email?> <br></a>
            <a>Telefone: <?=$empresa->telefone?><br></a>
            <h5>Funcionário: <?=$funcionario->username?></h5>
        </div>
        <div class="column">
            <h2>Cliente:</h2>
            <a><?=$cliente->username?><br></a>
            <a>Morada: <?=$cliente->morada?>, <br> <?=$cliente->localidade?> <?=$cliente->codigopostal?><br></a>
            <a>Email: <?=$cliente->email?> <br></a>
            <a>Telefone: <?=$cliente->telefone?></a>
        </div>
    </div>

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
                    $valorSemIva += $linhaFatura->quantidade * $linhaFatura->valorunitario;
                    $valorIva+= $linhaFatura->quantidade * $linhaFatura->valoriva;
                    ?>
                    <tr>
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
        <div class="row">
            <div class="column">

            </div>
            <div class="column">
                <table class="table tablestriped">
                    <tbody>
                        <tr>
                            <td>Valor S/iva:</td>
                            <td><?=$valorSemIva?>€</td>
                        </tr>
                        <tr>
                            <td>Valor iva:</td>
                            <td>+ <?=$valorIva?>€</td>
                        </tr>
                        <tr>
                            <td>Valor Total:</td>
                            <td>= <?=number_format($valorTotal, 2)?>€</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>