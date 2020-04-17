<?php

namespace backend\controllers;

use backend\models\factory\Pizza;
use backend\models\factory\PizzaStore;

class NYStylePizzaStore extends PizzaStore
{

    public function createPizza(String $item) : Pizza
    {
        if ($item == "cheese") {
            return new NYStyleCheesePizza();
        } elseif ($item=="pepperoni") {
            return new NYStylePepperoniPizza();
        } elseif ($item=="clam") {
            return new NYStyleClamPizza();
        } elseif ($item=="veggie") {
            return new NYStyleVeggiePizza();
        } else return null;
    }
}