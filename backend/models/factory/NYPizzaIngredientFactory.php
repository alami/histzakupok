<?php


namespace backend\models\factory;
//


class NYPizzaIngredientFactory implements PizzaIngredientFactory
{
    public function createDough(){return 'new ThinCrustDough()';}   //Dough
    public function createSauce(){return 'new MarinaraSauce()';}    //Sauce
    public function createCheese(){return 'new ReggianoCheese()';}  //Cheese
    public function createVeggies(){
         $veggies[] = [ new Garlic(), new Onion(), new Mushroom(), new RedPepper() ];
        return $veggies;
    }    //Veggies[]
    public function createPepperoni(){return new SlicedPepperoni();} //напрезанные Pepperoni
    public function createClam(){return new FreshClams();}           //свежии мидии,Clams
}