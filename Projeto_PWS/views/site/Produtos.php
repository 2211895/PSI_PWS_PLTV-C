<?php
$produtos = $params;

if($_SESSION['role'] == 3)
    header('location: router.php?c=site&a=index');
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<h2>Produtos</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped"><thead>
            <th><h3>Id</h3></th>
            <th><h3>Referencia</h3></th>
            <th><h3>Descrição</h3></th>
            <th><h3>Preço</h3></th>
            <th><h3>Stock</h3></th>
            <th><h3>Iva</h3></th>
            <th><h3>Acções</h3></th>
            <tbody>
            <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td><?=$produto->id?></td>
                    <td><?=$produto->referencia?></td>
                    <td><?=$produto->descricao?></td>
                    <td><?=$produto->preco?></td>
                    <td><?=$produto->stock?></td>
                    <td><?=$produto->iva->descricao?>  <?=$produto->iva->percentagem?>%</td>
                    <td>
                        <a href="router.php?c=produtos&a=details&id=<?=$produto->id ?>"
                           class="btn btn-info" role="button">Details</a>
                        <a href="router.php?c=produtos&a=edit&id=<?=$produto->id ?>"
                           class="btn btn-info" role="button">Edit</a>
                        <a href='router.php?c=produtos&a=delete&id=<?=$produto->id?>'
                           class='btn btn-warning' role='button'>Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Create a new produto</h3>
        <p>
            <a href="router.php?c=produtos&a=create" class="btn btn-info"
               role="button">New</a>
            <a href="router.php?c=site&a=index" class="btn btn-info"
               role="button">Homepage</a>
        </p>
    </div>
</div>


