<?php

namespace backend\models\decorator;

class Whip extends CondimentDecorator
{
    public $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
        $this->description = 'Whip';
    }

    public function getDescription()
    {
        return $this->beverage->getDescription() . ", Whip";
    }

    public function cost()
    {
        return .30 + $this->beverage->cost();
    }
}