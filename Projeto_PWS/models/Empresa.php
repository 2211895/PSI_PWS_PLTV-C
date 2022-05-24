<?php

class Empresa extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('designacao'),
        array('email'),
        array('telefone'),
        array('nif'),
        array('morada'),
        array('codpostal'),
        array('localidade'),
        array('capital')
    );
}