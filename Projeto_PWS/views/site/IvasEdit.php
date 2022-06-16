<?php
$iva = $params;
?>

<h1>Editar iva</h1>

<form action=router.php?c=ivas&a=update&id=<?=$iva->id?> method="post">
    <div>
        <label>PERCENTAGEM:</label>
        <input type='number' min="0" max="100" step="0.01" class="form-control" name='percentagem' value="<?=$iva->percentagem?>">
    </div>
    <div>
        <label>DESCRIÇÃO:</label>
        <input type='text' class="form-control" name='descricao' value="<?=$iva->descricao?>">
    </div>
    <div>
        <label>VIGOR:</label>
        <select name="vigor">
            <option value=1>Ativo</option>
            <option value=0>Inativo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-info">Concluir</button>
</form>

<a href="router.php?c=ivas&a=index" class="btn btn-info" role="button">Voltar</a>
