<?php
$empresas = $params;
?><!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
!-->

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
    <h2 id="caixa">Empresas</h2>
    <h2 class="top-space"></h2>
    <div class="row">
        <div class="col-sm-12">
            <table class="table tablestriped">
                <thead>
                <th><h3>Id</h3></th>
                <th><h3>Nome</h3></th>
                <th><h3>Email</h3></th>
                <th><h3>Telefone</h3></th>
                <th><h3>Nif</h3></th>
                <th><h3>Morada</h3></th>
                <th><h3>Código postal</h3></th>
                <th><h3>Localidade</h3></th>
                <th><h3>Capital</h3></th>
                <th><h3>Ações</h3></th>
                </thead>
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
                            <a href="router.php?c=empresas&a=edit&id=<?=$empresa->id ?>"
                               class="btn btn-info" role="button"><i class='fa-solid fa-pencil' style='color: black'></i></a>
                        </td    >
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6" id="caixa">
                <a href="router.php?c=site&a=index" class="btn btn-info"
                   role="button" style="background-color: rgba(82,151,255,1);color: white;border-radius: 3px;text-decoration: none;padding: 4px;">Homepage</a>
            </p>
        </div>
    </div>
    </div>
</div>
