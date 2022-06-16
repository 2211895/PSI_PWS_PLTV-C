<?php
$users = $params;

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<h2>Utilizadores</h2>
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
            <th><h3>Role</h3></th>
            <th><h3>Acções</h3></th></thead>
            <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?=$user->id?></td>
                    <td><?=$user->username?></td>
                    <td><?=$user->email?></td>
                    <td><?=$user->telefone?></td>
                    <td><?=$user->nif?></td>
                    <td><?=$user->morada?></td>
                    <td><?=$user->codigopostal?></td>
                    <td><?=$user->localidade?></td>
                    <td><?php switch ($user->role) {
                            case 1:
                                echo 'Administrador';
                                break;
                            case 2:
                                echo 'Funcionário';
                                break;
                            case 3:
                                echo 'Cliente';
                                break;
                        }?></td>
                    <td>
                        <?php if($user->role == 3) {
                            echo "<a href='router.php?c=faturas&a=cliente&id=$user->id'
                           class='btn btn-info' role='button'>Detalhes</a>";
                        }
                        ?>

                        <?php if($_SESSION['userId']==$user->id || $_SESSION['role']==1) {
                            echo "<a href='router.php?c=users&a=edit&id=$user->id'
                           class='btn btn-info' role='button'>Editar</a>";
                        }
                        ?>
                        <?php if($user->role !=1 && $_SESSION['role']==1) {
                            echo "<a href='router.php?c=users&a=delete&id=$user->id'
                           class='btn btn-warning' role='button'>Apagar</a>";
                        }
                        ?>
                    </td    >
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Criar um novo utilizador</h3>
        <p>
            <a href="router.php?c=users&a=create" class="btn btn-info"
               role="button">Novo utilizador</a>
            <a href="router.php?c=site&a=index" class="btn btn-info"
               role="button">Homepage</a>
        </p>
    </div>
</div>


