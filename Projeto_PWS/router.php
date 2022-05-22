<?php

/* Arranque da aplicação */
//require_once './startup/boot.php';

/* Controladores */
require_once './controllers/SiteController.php';
require_once './controllers/LoginController.php';

if(!(isset($_GET['c']) && isset($_GET['a']))){
    // Controller e action por omissão

    $siteController = new SiteController();
    $siteController->redirectToRoute('login','index');
}else {
    //trabalha com o c=site no link
    $controller = $_GET['c'];
    //trabalha com o a=action no link
    $action = $_GET['a'];

    switch ($controller) {
        case 'login':
            $loginController = new LoginController();
            switch ($action) {
                case 'index':
                    $loginController->renderView('Login');
                    break;
            }
            break;

    }

}
