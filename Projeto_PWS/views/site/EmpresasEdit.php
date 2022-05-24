<h1>EDIT EMPRESA</h1>

<form action=router.php?c=empresas&a=update&id=<?=$empresa->id?> method="post">
    <div>
        <label>NOME:</label>
        <input type='text' class="form-control" name='designacao' value="<?=$empresa->designacao?>">
    </div>
    <div>
        <label>EMAIL:</label>
        <input type='email' class="form-control" name='email' value="<?=$empresa->email?>">
    </div>
    <div>
        <label>TELEFONE:</label>
        <input type='number' class="form-control" min="0" max="999999999" name='telefone' value="<?=$empresa->telefone?>">
    </div>
    <div>
        <label>NIF:</label>
        <input type='number' class="form-control"  min="100000000" max="999999999" name='nif' value="<?=$empresa->nif?>">
    </div>
    <div>
        <label>MORADA:</label>
        <input type='text' class="form-control" name='morada' value="<?=$empresa->morada?>">
    </div>
    <div>
        <label>CODIGO POSTAL:</label>
        <input type='text' class="form-control" name='codpostal' value="<?=$empresa->codpostal?>">
    </div>
    <div>
        <label>LOCALIDADE:</label>
        <input type='text' class="form-control" name='localidade' value="<?=$empresa->localidade?>">
    </div>
    <div>
        <label>CAPITAL:</label>
        <input type='number' class="form-control" min="0" step="0.01" name='capital' value="<?=$empresa->capital?>">
    <button type="submit" class="btn btn-info">Submit</button>
</form>
