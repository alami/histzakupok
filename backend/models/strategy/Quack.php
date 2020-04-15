<?php
namespace backend\models\strategy;

class Quack implements BehaviorQuack {
    public function quack () {
        return 'quack-quack-quack ';
    }
}