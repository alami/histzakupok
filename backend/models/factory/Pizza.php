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
    public $name;
    public $dough;
    public $sauce;
    public $toppings = []; //new ArrayList<String>();

    function prepare()
    {
        $ret = "Preparing " . $this->name."<br>";
        $ret .= "Tossing dough..."."<br>";
        $ret .= "Adding sauce..."."<br>";
        $ret .= "Adding toppings: "."<br>";
        foreach ($this->toppings as $topping) { //String  :
            $ret .= " " . $topping."<br>";
        }
        return $ret;
    }

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

    public function getName(): String
    {
        return $this->name;
    }
}