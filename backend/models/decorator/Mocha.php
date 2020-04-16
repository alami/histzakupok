<?php

namespace backend\models\decorator;

class Mocha extends CondimentDecorator
{
    public $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
        $this->description = "Mocha";
    }

    public function getDescription()
    {
        return $this->beverage->getDescription() . ", Mocha";
    }

    public function cost()
    {
        return .20 + $this->beverage->cost();
    }
}