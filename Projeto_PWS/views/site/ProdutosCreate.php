<?php
$ivas = Iva::all();
if($_SESSION['role'] == 3)
    header('location: router.php?c=site&a=index');
?>
<h1>CREATE PRODUTO</h1>

<form action=router.php?c=produtos&a=store method="post">
    <div>
        <label>REFERENCIA:</label>
        <input type='text' class="form-control" name='referencia' placeholder="">
    </div>
    <div>
        <label>DESCRICAO:</label>
        <input type='text' class="form-control" name='descricao' placeholder="">
    </div>
    <div>
        <label>PRECO:</label>
        <input type='number' class="form-control" min="0" step="0.01" name='preco' placeholder="">
    </div>
    <div>
        <label>STOCK:</label>
        <input type='number' class="form-control" min="0" name='stock' placeholder="">
    </div>
    <div>
        <label>IVA:</label>
        <select name="iva_id">
            <?php
            foreach ($ivas as $iva){ ?>
                <option value="<?= $iva->id?>"> <?= $iva->descricao?> <?=$iva->percentagem?>%</option>
            <?php }?>
        </select>
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
</form>

<a href="router.php?c=produtos&a=index" class="btn btn-info" role="button">Voltar</a>