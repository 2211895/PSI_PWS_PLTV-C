<?php
$empresa = $params;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="public/css/Edit.css">
<div id="content">
<h1 style="text-align: center">Editar Empresa</h1>

<form action=router.php?c=empresas&a=update&id=<?=$empresa->id?> method="post">
    <div class="informacoes">
        <label>Nome:</label><br>
        <input type='text' class="form-control" name='designacao' value="<?=$empresa->designacao?>">
    </div>
    <div class="informacoes">
        <label>Email:</label><br>
        <input type='email' class="form-control" name='email' value="<?=$empresa->email?>">
    </div>
    <div class="informacoes">
        <label>Telefone:</label><br>
        <input type='number' class="form-control" min="0" max="999999999" name='telefone' value="<?=$empresa->telefone?>">
    </div>
    <div class="informacoes">
        <label>NIF:</label><br>
        <input type='number' class="form-control"  min="100000000" max="999999999" name='nif' value="<?=$empresa->nif?>">
    </div>
    <div class="informacoes">
        <label>Morada:</label><br>
        <input type='text' class="form-control" name='morada' value="<?=$empresa->morada?>">
    </div>
    <div class="informacoes">
        <label>Código postal:</label><br>
        <input type='text' class="form-control" name='codpostal' value="<?=$empresa->codpostal?>">
    </div>
    <div class="informacoes">
        <label>Localidade:</label><br>
        <input type='text' class="form-control" name='localidade' value="<?=$empresa->localidade?>">
    </div>
    <div class="informacoes">
        <label>Capital:</label><br>
        <input type='number' class="form-control" min="0" step="0.01" name='capital' value="<?=$empresa->capital?>">
    <button type="submit" class="btn btn-info" id="submit">Concluir</button>
</form>

<a href="router.php?c=empresas&a=index" class="btn btn-info" role="button"><i class="fa-solid fa-arrow-left" id="voltar"></i></a>
</div>