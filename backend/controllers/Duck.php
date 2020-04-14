<?php


namespace backend\controllers;


abstract class Duck {
    public function quack(){
        return 'quack-quack-quack ';
    }
    public function swim () {
        return 'swim-swim-swim ';
    }
    public function fly () {
        return 'fly-fly-fly ';
    }
    abstract function display ();

}