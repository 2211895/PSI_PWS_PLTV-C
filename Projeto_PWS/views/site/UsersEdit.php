<?php
$users = $params;
?>
<link rel="stylesheet" href="public/css/Edit.css">
<div id="content">
<h1 style="text-align: center">EDIT USER</h1>

<form action=router.php?c=users&a=update&id=<?=$users->id?> method="post">
    <div>
        <label>NOME:</label>
        <input type='text' class="form-control" name='username' value="<?=$users->username?>">
    </div>
    <div>
        <label>PASSWORD:</label>
        <input type='password' class="form-control" name='password' value="<?=$users->password?>">
    </div>
    <div>
        <label>EMAIL:</label>
        <input type='email' class="form-control" name='email' value="<?=$users->email?>">
    </div>
    <div>
        <label>TELEFONE:</label>
        <input type='number' class="form-control" min="0" max="999999999" name='telefone' value="<?=$users->telefone?>">
    </div>
    <div>
        <label>NIF:</label>
        <input type='number' class="form-control"  min="100000000" max="999999999" name='nif' value="<?=$users->nif?>">
    </div>
    <div>
        <label>MORADA:</label>
        <input type='text' class="form-control" name='morada' value="<?=$users->morada?>">
    </div>
    <div>
        <label>CÓDIGO POSTAL:</label>
        <input type='text' class="form-control" name='codigopostal' value="<?=$users->codigopostal?>">
    </div>
    <div>
        <label>LOCALIDADE:</label>
        <input type='text' class="form-control" name='localidade' value="<?=$users->localidade?>">
    </div>
    <div>
        <label>ROLE:</label>
        <select name="role">
            <?php if($_SESSION['role']==1){?>
                <option value=1>Administrador</option>
                <option value=3>Cliente</option>
            <?php } ?>
            <option value=2>Funcionário</option>
        </select>
    </div>
    <button type="submit" class="btn btn-info">Concluir</button>
</form>

<a href="router.php?c=users&a=index" class="btn btn-info" role="button">Voltar</a>
</div>
