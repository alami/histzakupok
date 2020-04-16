<?php


namespace backend\models\decorator;


class DarkRoast extends Beverage
{
    public function __construct()
    {
        $this->description = "Dark Roast Coffee";
    }

    public function cost()
    {
        return 1.99;
    }
}