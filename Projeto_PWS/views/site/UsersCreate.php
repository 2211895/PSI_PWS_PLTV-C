
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="public/css/Edit.css">
<div id="content">

<h1 style="text-align: center">Criar utilizador</h1>
<form action="router.php?c=users&a=store" method="post">
    <div class="informacoes">
        <label>Nome:</label><br>
        <input type='text' class="form-control" name='username' placeholder="Insira o username..." >
    </div>
    <div class="informacoes">
        <label>Password:</label><br>
        <input type='password' class="form-control" name='password' placeholder="Insira a password...">
    </div>
    <div class="informacoes">
        <label>Email:</label><br>
        <input type='email' class="form-control" name='email' placeholder="Insira o email...">
    </div>
    <div class="informacoes">
        <label>Telefone:</label><br>
        <input type='number' class="form-control" min="0" max="999999999" name='telefone' placeholder="Insira o numero de telefone...">
    </div>
    <div class="informacoes">
        <label>NIF:</label><br>
        <input type='number' class="form-control"  min="100000000" max="999999999" name='nif' placeholder="Insira o NIF...">
    </div>
    <div class="informacoes">
        <label>Morada:</label><br>
        <input type='text' class="form-control" name='morada' placeholder="Insira a sua morada...">
    </div>
    <div class="informacoes">
        <label>Código postal:</label><br>
        <input type='text' class="form-control" name='codigopostal' placeholder="Insira o codigo postal...">
    </div>
    <div class="informacoes">
        <label>Localidade:</label><br>
        <input type='text' class="form-control" name='localidade' placeholder="Insira a localidade...">
    </div>
    <div class="informacoes">
        <label>Role:</label><br>
        <select name="role">
            <?php if($_SESSION['role']==1){?>
                <option value=1>Administrador</option>
                <option value=2>Funcionário</option>
            <?php } ?>
            <option value=3>Cliente</option>
        </select>
    </div>
    <button type="submit" class="btn btn-info" id="submit">Criar</button>
    <a href="router.php?c=users&a=index" class="btn btn-info"
       role="button"><i class="fa-solid fa-arrow-left" id="voltar"></i></a>
</form>
</div>

