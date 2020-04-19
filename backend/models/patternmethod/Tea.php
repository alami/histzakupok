<?php


namespace backend\models\patternmethod;


class Tea extends CaffeineBeverage
{

    public function brew()
    {
        return "Steeping the tea<br>";
    }

    public function addCondiments()
    {
        return "Adding Lemon<br>";
    }
}