<?php


namespace backend\models\factory;


class ClamPizza extends Pizza
{
    public $ingredientFactory;
    public function __construct(PizzaIngredientFactory $ingredientFactory)
    {   $this->ingredientFactory = $ingredientFactory;
    }

    function prepare()
        {
        $ret = "Preparing " . $this->name."<br>";
        $this->dough = $this->ingredientFactory->createDough();
        $this->sauce = $this->ingredientFactory->createSauce();
        $this->cheese = $this->ingredientFactory->createCheese();
        $this->clam = $this->ingredientFactory->createClam();
        return $ret;
    }
}