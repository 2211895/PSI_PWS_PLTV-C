<?php
$users = $params;
?>

<script src="public/js/FaturasCreate.js"></script>
<link rel = "stylesheet" href = "public/css/BarraPesquisa.css" >

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel = "stylesheet" href = "public/css/Homepage.css" >
<link rel="stylesheet" href="public/css/table.css">
<script src="public/js/NavBar.js"></script>

<div style="justify-content: space-between">

<div id="navBar" style="float: left">

<div id="buttons" style="margin: 0px">

    <button type="button" onclick="HideNavBar()" id="hideNavBar"><i class="fa-solid fa-bars"></i></button>
    <br> <br> <br>

    <a href="router.php?c=login&a=logout"
       class="btn btn-info" role="button"><i class="fa-solid fa-arrow-right-from-bracket"></i> <span class="NavText"> Logout</span></a>


    <?php
    if($_SESSION['role']!=3){
        echo '
        <a href="router.php?c=users&a=index"
        class="btn btn-info" role="button"><i class="fa-solid fa-user"></i><span class="NavText">Utilizadores</span></a>
        <a href="router.php?c=empresas&a=index"
        class="btn btn-info" role="button"><i class="fa-solid fa-building"></i> <span class="NavText">Empresas</span></a>
        <a href="router.php?c=ivas&a=index"
        class="btn btn-info" role="button"><i class="fa-solid fa-percent"></i><span class="NavText">Ivas</span></a>
        <a href="router.php?c=produtos&a=index"
        class="btn btn-info" role="button"><i class="fa-solid fa-cart-shopping"></i> <span class="NavText">Produtos</span></a>
        <a href="router.php?c=faturas&a=index"
        class="btn btn-info" role="button"><i class="fa-solid fa-clock-rotate-left"></i><span class="NavText"> Histórico de faturas</span></a>
        <a href="router.php?c=faturas&a=create"
        class="btn btn-info" role="button"><i class="fa-solid fa-file-circle-plus"></i> <span class="NavText">Nova fatura</span></a>';
    }
    else
        echo '<a href="router.php?c=faturas&a=cliente&id=' . $_SESSION['userId'] . '"
        class="btn btn-info" role="button">Minhas faturas</a>';
    ?>
</div>

</div>


    <div style="width: 79%; float: left; margin-left: 10px;">
<h2 id="caixa" >Utilizadores</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped" id="myTable"><thead>
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
                           class='btn btn-info' role='button'><i class='fa-solid fa-eye' style='color: black'></i></a>";
                        }
                        ?>

                        <?php if($_SESSION['userId']==$user->id || $_SESSION['role']==1) {
                            echo "<a href='router.php?c=users&a=edit&id=$user->id'
                           class='btn btn-info' role='button'><i class='fa-solid fa-pencil' style='color: black'></i></a>";
                        }
                        ?>
                        <?php if($user->role !=1 && $_SESSION['role']==1) {
                            echo "<a href='router.php?c=users&a=delete&id=$user->id'
                           class='btn btn-warning' role='button'><i class='fa-solid fa-trash-can' style='color: black'></i></a>";
                        }
                        ?>
                    </td    >
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6" id="caixa">
        <h3>Criar um novo utilizador</h3>
        <p>
            <a href="router.php?c=users&a=create" class="btn btn-info"
               role="button" style="background-color: rgba(82,151,255,1);color: white;border-radius: 3px;text-decoration: none;padding: 4px;">Novo utilizador</a>
            <a href="router.php?c=site&a=index" class="btn btn-info"
               role="button" style="background-color: rgba(82,151,255,1);color: white;border-radius: 3px;text-decoration: none;padding: 4px;">Homepage</a>
        </p>
    </div>
</div>
</div>
</div>


