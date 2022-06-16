<?php
$users = $params
?>
<link rel="stylesheet" href="public/css/Edit.css">
<h1>EDIT USER</h1>
<!--- DATALISTS --->
<datalist id="roles">
    <option value=1>
    <option value=2>
    <option value=3>
</datalist>
<div id="">
<form action=router.php?c=users&a=update&id=<?=$users->id?> method="post">
    <div>
        <label>NOME:</label>
        <input type='text' class="form-control" name='username' value="<?=$users->username?>">
    </div>
    <div>
        <label>PASSWORD:</label>
        <input type='text' class="form-control" name='password' value="<?=$users->password?>">
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
        <label>CODIGO POSTAL:</label>
        <input type='text' class="form-control" name='codigopostal' value="<?=$users->codigopostal?>">
    </div>
    <div>
        <label>LOCALIDADE:</label>
        <input type='text' class="form-control" name='localidade' value="<?=$users->localidade?>">
    </div>
    <div>
        <label>ROLE:</label>
        <select name="role">
            <option value=1>Administrador</option>
            <option value=2>Funcionario</option>
            <option value=3>Cliente</option>
        </select>
        <!---<input type='number' class="form-control" min="1" max="3" name='role' value="<?//=$users->role?>">-->
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
</form>

<a href="router.php?c=users&a=index" class="btn btn-info" role="button">Voltar</a>
</div>