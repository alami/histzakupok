<?php


namespace backend\models\factory;


class CheesePizza extends Pizza
{
    /*public $ingredientFactory; //PizzaIngredientFactory

    public function __construct(PizzaIngredientFactory $ingredientFactory)
    {
        $this->ingredientFactory = $ingredientFactory;
    }*/

    public function prepare()
    {
        return "Preparing " . $this->name;
        /*$this->dough = $this->ingredientFactory->createDough();
        $this->sauce = $this->ingredientFactory->createSauce();
        $this->cheese = $this->ingredientFactory->createCheese();*/
    }
}