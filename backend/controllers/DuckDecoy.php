<?php


namespace backend\controllers;


class DuckDecoy extends Duck
{
    public function fly()
    {
        return '';
    }
    public function quack()
    {
        return '';
    }

    public function display()
    {
        return 'DuckDecoy: ';
    }
}