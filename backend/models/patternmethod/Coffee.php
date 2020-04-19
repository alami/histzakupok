<?php

namespace backend\models\patternmethod;

class Coffee extends CaffeineBeverage
{
    public function brew()
    {
        return "Dripping Coffee through filter<br>";
    }

    public function  addCondiments()
    {
        return "Adding Sugar and Milk<br>";
    }

}