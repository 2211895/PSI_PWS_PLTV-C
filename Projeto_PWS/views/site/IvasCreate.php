<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="public/css/Edit.css">
<div id="content">
<h1 style="text-align: center">Criar Iva</h1>

<form action="router.php?c=ivas&a=store" method="post">
    <div class="informacoes">
        <label>Percentagem:</label><br>
        <input type='number' min="0" max="100" step="0.01" class="form-control" name='percentagem' placeholder="Insira a percentagem..." ">
    </div>
    <div class="informacoes">
        <label>Descrição:</label><br>
        <input type='text' class="form-control" name='descricao' placeholder="Insira a descrição...">
    </div>
    <div class="informacoes">
        <label>Vigor:</label><br>
        <select name="vigor">
            <option value=1>Ativo</option>
            <option value=0>Inativo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-info" id="submit">Criar</button>
</form>

<a href="router.php?c=ivas&a=index" class="btn btn-info" role="button"><i class="fa-solid fa-arrow-left" id="voltar"></i></a>
</div>