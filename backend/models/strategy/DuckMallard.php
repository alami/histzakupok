<?php
namespace backend\models\strategy;

class DuckMallard extends Duck
{
    public function __construct() {
        $this->behaviorFly = new FlyWith();
        $this->behaviorQuack = new Quack();
    }

    public function display()     {
        return 'DuckMallard: ';
    }
}