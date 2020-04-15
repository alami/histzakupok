<?php
namespace backend\models\strategy;

class QuackNo implements BehaviorQuack {
    public function quack () {
        return '';
    }
}