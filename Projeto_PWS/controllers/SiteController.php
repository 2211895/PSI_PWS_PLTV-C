<?php

class SiteController
{
    public function redirectToRoute($controller,$action){
        header("Location: ./router.php?c=$controller&a=$action");
    }
    public function renderView($view, $params = []) {
        extract($params);
        require_once "./views/layout/header.php";
        require_once "./views/site/" .$view. ".php";
        require_once "./views/layout/footer.php";
    }
}