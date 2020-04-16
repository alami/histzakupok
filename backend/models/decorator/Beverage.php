<?php

namespace backend\models\decorator;

abstract class Beverage
{
    public $description ;

    public function getDescription()
    {
        return $this->description;
    }
    abstract public function cost();
}