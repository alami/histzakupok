<?php


namespace backend\models\factory;


class ChicagoPizzaStore extends PizzaStore
{

    function createPizza(String $type): Pizza
    {
        $pizza = null;
        if ($type == "cheese") {
            $pizza = new ChicagoStyleCheesePizza();
        } elseif ($type=="pepperoni") {
            $pizza = new ChicagoStylePepperoniPizza();
        } elseif ($type=="clam") {
            $pizza = new ChicagoStyleClamPizza();
        } elseif ($type=="veggie") {
            $pizza = new ChicagotyleVeggiePizza();
        }
        return $pizza;    }
}