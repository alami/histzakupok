<?php


namespace backend\models\factory;


class ChicagoStyleCheesePizza extends Pizza
{
    public function __construct()
    {
        $name = "Chicago Style Deep Dish Cheese Pizza";
        $dough = "Extra Thick Crust Dough";//на толстой основе
        $sauce = "Plum Tomato Sauce"; //томатный соус
        $topping[] = "Shredded Mozzarella Cheese";//много сыра «моцарелла»!
    }
    public function cut () {//нарезается не клиньями, а квадратами
        return "Cutting the pizza into square slices<br>";
    }
}