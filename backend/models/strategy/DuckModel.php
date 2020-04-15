<?php
namespace backend\models\strategy;

class DuckModel extends Duck
{
    public function __construct() {
        $this->behaviorFly = new FlyNo();
        $this->behaviorQuack = new Quack();
    }

    public function display()     {
        return 'DuckModel: ';
    }
}