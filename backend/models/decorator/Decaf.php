<?php


namespace backend\models\decorator;


class Decaf extends Beverage
{
    public function __construct()
    {
        $this->description = "Decaf Coffee";
    }

    public function cost()
    {
        return .99;
    }
}