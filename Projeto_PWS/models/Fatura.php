<?php

class Fatura extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('data'),
        array('valortotal'),
        array('ivatotal'),
        array('estado')
    );
}