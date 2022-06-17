<?php
$produtos = $params;
$ivas = Iva::all();
if($_SESSION['role'] == 3)
    header('location: router.php?c=site&a=index');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="public/css/Edit.css">
<div id="content">

<h1 style="text-align: center">Editar produto</h1>

<form action=router.php?c=produtos&a=update&id=<?=$produtos->id?> method="post">
    <div class="informacoes">
        <label>REFERÊNCIA:</label><br>
        <input type='text' class="form-control" name='referencia' value="<?=$produtos->referencia?>">
    </div>
    <div class="informacoes">
        <label>DESCRIÇÃO:</label><br>
        <input type='text' class="form-control" name='descricao' value="<?=$produtos->descricao?>">
    </div>
    <div class="informacoes">
        <label>PREÇO:</label><br>
        <input type='number' class="form-control" min="0" step="0.01" name='preco' value="<?=$produtos->preco?>">
    </div>
    <div class="informacoes">
        <label>STOCK:</label><br>
        <input type='number' class="form-control" min="0" name='stock' value="<?=$produtos->stock?>">
    </div>
    <div class="informacoes">
        <label>IVA:</label><br>
        <select name="iva_id">
        <?php
        foreach ($ivas as $iva){
            if($iva->vigor==1){?>
                <option value="<?= $iva->id?>"> <?= $iva->descricao?> <?=$iva->percentagem?>%</option>
        <?php } }?>
        </select>
    </div>
    <button type="submit" class="btn btn-info" id="submit">Concluir</button>
</form>

<a href="router.php?c=produtos&a=index" class="btn btn-info" role="button"><i class="fa-solid fa-arrow-left" id="voltar"></i></a>
</div>
