<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin = "anonymous" ></script >

<link rel = "stylesheet" href = "public/css/Login.css" >
<div id="content">
    <div id = "Login" >
        <h1 id = "login-text" > Login</h1 >
        <div >
            <form id = "formulario" action = "router.php?c=login&a=auth" method = "post" >

                    <input class="inputs" type = "text" name = "nome" placeholder="Username"><br >

                    <input class="inputs" type = "password" name = "password" placeholder="Password"><br >

                    <a><input id = "submitInput" type = "submit" value = "Entrar" ></a >
                </form >
        </div >
    </div >
</div>