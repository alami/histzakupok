<?php


namespace backend\models\strategy;


class DuckDecoy extends Duck
{
    public function __construct() {
        $this->behaviorFly = new FlyWith();
        $this->behaviorQuack = new QuackNo();
    }

    public function display()
    {
        return 'DuckDecoy: ';
    }
}