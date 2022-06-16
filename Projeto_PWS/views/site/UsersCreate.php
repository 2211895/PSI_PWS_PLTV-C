
<h1>Criar utilizador</h1>
<form action="router.php?c=users&a=store" method="post">
    <div>
        <label>NOME:</label>
        <input type='text' class="form-control" name='username' placeholder="Insira o username..." >
    </div>
    <div>
        <label>PASSWORD:</label>
        <input type='password' class="form-control" name='password'>
    </div>
    <div>
        <label>EMAIL:</label>
        <input type='email' class="form-control" name='email' placeholder="Insira o email...">
    </div>
    <div>
        <label>TELEFONE:</label>
        <input type='number' class="form-control" min="0" max="999999999" name='telefone' placeholder="Insira o numero de telefone...">
    </div>
    <div>
        <label>NIF:</label>
        <input type='number' class="form-control"  min="100000000" max="999999999" name='nif' placeholder="Insira o NIF...">
    </div>
    <div>
        <label>MORADA:</label>
        <input type='text' class="form-control" name='morada' placeholder="Insira a sua morada...">
    </div>
    <div>
        <label>CÓDIGO POSTAL:</label>
        <input type='text' class="form-control" name='codigopostal' placeholder="Insira o codigo postal...">
    </div>
    <div>
        <label>LOCALIDADE:</label>
        <input type='text' class="form-control" name='localidade' placeholder="Insira a localidade...">
    </div>
    <div>
        <label>ROLE:</label>
        <select name="role">
            <?php if($_SESSION['role']==1){?>
                <option value=1>Administrador</option>
                <option value=2>Funcionário</option>
            <?php } ?>
            <option value=3>Cliente</option>
        </select>
    </div>
    <button type="submit" class="btn btn-info">Criar</button>
    <a href="router.php?c=users&a=index" class="btn btn-info"
       role="button">Voltar</a>
</form>

