<?php

class Linhafatura extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('quantidade'),
        array('valorunitario'),
        array('valoriva')
    );
}