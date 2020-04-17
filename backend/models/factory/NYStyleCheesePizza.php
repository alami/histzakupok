<?php


namespace backend\models\factory;


class NYStyleCheesePizza extends Pizza
{
    public function __construct()
    {
        $name = "NY Style Sauce and Cheese Pizza";
        $dough = "Thin Crust Dough";//на тонкой основе
        $sauce = "Marinara Sauce";//с соусом «маринара»
        $topping[] = "Grated Reggiano Cheese";
    }   // 1 добавка: сыр «реджано»!
}