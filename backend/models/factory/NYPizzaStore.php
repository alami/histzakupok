<?php


namespace backend\models\factory;


use yii\helpers\VarDumper;

class NYPizzaStore extends PizzaStore
{

    function createPizza(String $type): Pizza
    {
        $pizza = null;
        $ingredientFactory = new NYPizzaIngredientFactory();
        if ($type == "cheese") {
            $pizza = new CheesePizza($ingredientFactory);
            $pizza->setName("New York Style Cheese Pizza");
        } elseif ($type=="pepperoni") {
            $pizza = new PepperoniPizza($ingredientFactory);
            $pizza->setName("New York Style Pepperoni Pizza");
        } elseif ($type=="clam") {
            $pizza = new ClamPizza($ingredientFactory);
            $pizza->setName("New York Style Clam Pizza");
        } elseif ($type=="veggie") {
            $pizza = new VeggiePizza($ingredientFactory);
            $pizza->setName("New York Style Veggie Pizza");
        }
        return $pizza;
    }
}