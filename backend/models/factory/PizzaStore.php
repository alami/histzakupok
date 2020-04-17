<?php

namespace backend\models\factory;

use yii\helpers\VarDumper;

/*abstract*/ class PizzaStore
{
    public function orderPizza(String $type): Pizza
    {
        /*
         * var@ Pizza $pizza
         */
        $pizza = (new SimplePizzaFactory)->createPizza($type);

        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();
        return $pizza;
    }
//    abstract function createPizza(String $type);
}