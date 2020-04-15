<?php


namespace backend\models\strategy;


class DuckRubber extends Duck
{
    public function __construct() {
        $this->behaviorFly = new FlyNo();
        $this->behaviorQuack = new Quack();
    }
    public function display()
    {
        return 'DuckRubber: ';
    }
}