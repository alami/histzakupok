<?php


namespace backend\models\factory;


use yii\helpers\VarDumper;

class NYPizzaStore extends PizzaStore
{

    function createPizza(String $type): Pizza
    {
        $pizza = null;
        if ($type == "cheese") {
            $pizza = new NYStyleCheesePizza();
        } elseif ($type=="pepperoni") {
            $pizza = new NYStylePepperoniPizza();
        } elseif ($type=="clam") {
            $pizza = new NYStyleClamPizza();
        } elseif ($type=="veggie") {
            $pizza = new NYStyleVeggiePizza();
        }
        return $pizza;
    }
}