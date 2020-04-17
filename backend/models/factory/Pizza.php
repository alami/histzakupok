<?php

namespace backend\models\factory;

use yii\helpers\VarDumper;

abstract class Pizza
{
    /*
     * @var String $name;
     * @var String $dough;
     * @var String $sauce;
     */
    public $name;  //название
    public $dough;//тип основы
    public $sauce;//тип соуса
    public $toppings = []; //добавки new ArrayList<String>();
    public $veggies = [];
    public $cheese;
    public $pepperoni;
    public $clam;

    abstract function prepare();

    function bake()
    {
        return "Bake for 25 minutes at 350";
    }

    function cut()
    {
        return "Cutting the pizza into diagonal slices";
    }

    function box()
    {
        return "Place pizza in official PizzaStore box";
    }

    public function setName(String $name) {
        $this->name = $name;
    }
    public function getName(): String
    {
        return $this->name;
    }
    public function toString () {

    }
}