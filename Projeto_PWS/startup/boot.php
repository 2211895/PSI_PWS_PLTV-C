<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1);

require './vendor/autoload.php';
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('./models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://admin:admin@localhost/projetoPWC',
        )
    );
});

