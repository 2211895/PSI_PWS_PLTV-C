<body>
<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin = "anonymous" ></script >

  <link rel = "stylesheet" href = "public/css/Login.css" >

    <div id="content">
        <div id = "Login" >
            <h1 id = "login-text" > Login</h1 >
            <div >
                <form id = "formulario" action = "=controllers/LoginController.php" method = "post" >

                    <p > Nome:</p >
                    <input class="inputs" type = "text" name = "nome" ><br >

                    <p > Password:</p >
                    <input class="inputs" type = "password" name = "password" ><br >

                    <a href = "page1" ><input id = "submitInput" type = "submit" vaule = "Entrar" ></a >
                </form >
            </div >
        </div >
    </div>
</body>