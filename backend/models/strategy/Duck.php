<?php


namespace backend\models\strategy;


abstract class Duck
{
    /*
     * @var BehaviorFly $behaviorFly
     * @var BehaviorQuack $behaviorQuack
     */
    public $behaviorFly;
    public $behaviorQuack;

    abstract function display();

    public function performFly()
    {
        return $this->behaviorFly->fly();
    }

    public function performQuack()
    {
        return $this->behaviorQuack->quack();
    }

    public function swim()
    {
        return 'swim-swim-swim ';
    }

    public function setFlyBehavior(BehaviorFly $fb)
    {
        $this->behaviorFly = $fb;
    }

    public function setQuackBehavior(BehaviorQuack $qb)
    {
        $behaviorQuack = $qb;
    }
}