<?php

namespace backend\models\decorator;

class Soy extends CondimentDecorator
{
    public $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
        $this->description = 'Soy';
    }

    public function getDescription()
    {
        return $this->beverage->getDescription() . ", Soy";
    }

    public function cost()
    {
        return .30 + $this->beverage->cost();
    }
}