<?php

namespace backend\models\patternmethod;

abstract class CaffeineBeverage
{
    final function prepareRecipe()
    {
        $ret ='';
        $ret .= $this->boilWater();
        $ret .= $this->brew();
        $ret .= $this->pourInCup();
        $ret .= $this->addCondiments();
        return $ret;
    }
    abstract function brew();
    abstract function addCondiments();

    public function boilWater()
    {
        return "Boiling water<br>";
    }
    public function pourInCup()
    {
        return "Pouring into cup<br>";
    }
}