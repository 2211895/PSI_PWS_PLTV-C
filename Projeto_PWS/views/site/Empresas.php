<?php
$empresas = $params;
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <h2>Empresas</h2>
    <h2 class="top-space"></h2>
    <div class="row">
        <div class="col-sm-12">
            <table class="table tablestriped"><thead>
                <th><h3>Id</h3></th>
                <th><h3>Name</h3></th>
                <th><h3>Email</h3></th>
                <th><h3>Telefone</h3></th>
                <th><h3>Nif</h3></th>
                <th><h3>Morada</h3></th>
                <th><h3>Codigo postal</h3></th>
                <th><h3>Localidade</h3></th>
                <th><h3>Capital</h3></th></thead>
                <tbody>
                <?php foreach ($empresas as $empresa) { ?>
                    <tr>
                        <td><?=$empresa->id?></td>
                        <td><?=$empresa->designacao?></td>
                        <td><?=$empresa->email?></td>
                        <td><?=$empresa->telefone?></td>
                        <td><?=$empresa->nif?></td>
                        <td><?=$empresa->morada?></td>
                        <td><?=$empresa->codpostal?></td>
                        <td><?=$empresa->localidade?></td>
                        <td><?=$empresa->capital?></td>
                        <td>
                            <a href="router.php?c=empresas&a=details&id=<?=$empresa->id ?>"
                               class="btn btn-info" role="button">Details</a>
                            <a href="router.php?c=empresas&a=edit&id=<?=$empresa->id ?>"
                               class="btn btn-info" role="button">Edit</a>
                        </td    >
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
                <a href="router.php?c=site&a=index" class="btn btn-info"
                   role="button">Homepage</a>
            </p>
        </div>
    </div>