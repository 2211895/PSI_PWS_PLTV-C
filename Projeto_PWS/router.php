<?php
//ATENCAO ACABAR:
//cuidado com o renderview argumento dos params



/* Arranque da aplicação */
require_once './startup/boot.php';

/* Controladores */
require_once 'controllers/SiteController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/UsersController.php';
require_once 'controllers/EmpresasController.php';

/* Modelos */
require_once 'models/User.php';

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
                    $loginController->renderView('Login', 0);
                    break;

                case 'auth':
                    $loginController->login($_POST['nome'],$_POST['password']);
                    break;

                case 'logout':
                    $loginController->logout();
                    break;
            }
            break;

        case 'site':
            $siteController = new SiteController();
            switch ($action){
                case 'index':
                    $siteController->renderView('Homepage',0);
                    break;
            }
            break;

        case 'users':
            $usersController = new UsersController();
            switch ($action){
                case 'index':
                    $usersController->showUsers();
                    break;

                case 'details':
                    $id = $_GET['id'];
                    $usersController->detailsUser($id);
                    break;

                case 'edit':
                    $id = $_GET['id'];
                    $usersController->editUser($id);
                    break;

                case 'update':
                    $id = $_GET['id'];
                    $usersController->updateUser($id);
                    break;

                case 'create':
                    $usersController->createUser();
                    break;

                case 'store':
                    $usersController->storeUser();
                    break;

                case 'delete':
                    $id = $_GET['id'];
                    $usersController->deleteUser($id);
                    break;
            }
            break;

        case 'empresas':
            $empresasController = new EmpresasController();
            switch ($action){
                case 'index':
                    $empresasController->showEmpresas();
                    break;

                case 'details':
                    $id = $_GET['id'];
                    $empresasController->
                    break;

                case 'edit':
                    $id = $_GET['id'];
                    $empresasController->editEmpresa($id);
                    break;

                case 'update'    :
                    $id = $_GET['id'];
                    $empresasController->updateEmpresa($id);
            }
    }

}
