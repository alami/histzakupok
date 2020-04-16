<?php


namespace backend\models\decorator;


class HouseBlend extends Beverage
{
    public function __construct()
    {
        $this->description = "House Blend Coffee";
    }

    public function cost()
    {
        return .89;
    }
}