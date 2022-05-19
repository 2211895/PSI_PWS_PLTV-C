<?php

require_once './models/Data.php';

class SiteController
{
    public function index(){
        //require view index;
        require_once './views/site/index.php';
    }

    public function demo(){
        //call model and get data
        $d = new Data();
        $data = $d->getData();

        //require once view
        require_once './views/site/show.php';

    }

    public function name(){
        //buscar os dados ao model
        $d=new Data();
        $data=$d->getName();
        require_once './views/site/name.php';
    }

    public function plano(){
        //renderizar uma vista com o form plano
        require_once './views/site/plano.php';
    }

    public function processa(){
        //É responsavel por processar o form
        $nome=$_POST["nome"];

        //instanciar o model
        $d = new Data();
        $data = $d->getName();

        $fraseCompleta = "Bom dia $nome. Bem vindo ao $data";

        //enviar a variavel para a vista
        require_once './views/site/lab.php';
    }








}