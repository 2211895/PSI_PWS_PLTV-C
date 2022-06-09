<?php

$users = User::all();

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="public/js/FaturasCreate.js"></script>

<link rel = "stylesheet" href = "public/css/BarraPesquisa.css" >

<h2>Users</h2>
<input type="text" id="Input" onkeyup="barraPesquisa()" placeholder="Search for names..">
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table id="myTable">
            <tr class="header">
            <th class="th-sm"><h3>Id</h3></th>
            <th class="th-sm"><h3>Name</h3></th>
            <th class="th-sm"><h3>Email</h3></th>
            <th class="th-sm"><h3>Telefone</h3></th>
            <th class="th-sm"><h3>Nif</h3></th>
            <th class="th-sm"><h3>Morada</h3></th>
            <th class="th-sm"><h3>Codigo postal</h3></th>
            <th class="th-sm"><h3>Localidade</h3></th>
            <th class="th-sm"><h3></h3></th>
            </tr>
            <?php foreach ($users as $user) {
                if($user->role == 3 ){?>
                    <tr>
                        <td><?=$user->id?></td>
                        <td><?=$user->username?></td>
                        <td><?=$user->email?></td>
                        <td><?=$user->telefone?></td>
                        <td><?=$user->nif?></td>
                        <td><?=$user->morada?></td>
                        <td><?=$user->codigopostal?></td>
                        <td><?=$user->localidade?></td>
                        <td>
                            <a href="router.php?c=faturas&a=store&id=<?=$user->id ?>"
                               class="btn btn-info" role="button">Selecionar Cliente</a>
                        </td>
                    </tr>
                <?php }
            } ?>
        </table>
    </div>
    <div class="col-sm-6">
            <a href="router.php?c=site&a=index" class="btn btn-info"
               role="button">Homepage</a>
        </p>
    </div>
</div>


