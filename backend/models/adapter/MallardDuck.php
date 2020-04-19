<?php

namespace backend\models\adapter;

class MallardDuck implements Duck
{
    public function quack()
    {
        return "Quack";
    }

    public function fly()
    {
        return "I am fly";
    }
}