<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin = "anonymous" ></script >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel = "stylesheet" href = "public/css/Login.css" >
<div id="content">
    <div id = "Login" >
        <h1 id = "login-text" ><i class="fa-solid fa-user"></i></h1 >
        <div id="loginInputs">
            <form id = "formulario" action = "router.php?c=login&a=auth" method = "post" >

                    <input class="inputs" type = "text" name = "nome" placeholder="Username"><br >

                    <input class="inputs" type = "password" name = "password" placeholder="Password"><br >

                    <a><input id = "submitInput" type = "submit" value = "Entrar" ></a >
                </form >
        </div >
    </div >
</div>