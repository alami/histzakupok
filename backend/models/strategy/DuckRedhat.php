<?php


namespace backend\models\strategy;


class DuckRedhat extends Duck
{
    public function __construct() {
        $this->behaviorFly = new FlyWith();
        $this->behaviorQuack = new Quack();
    }

    public function display()
    {
        return 'DuckRedhat: ';
    }
}