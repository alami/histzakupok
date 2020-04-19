<?php


namespace backend\models\adapter;


class TurkeyAdapter implements Duck
{
    public $turkey;
    public function __construct(Turkey $turkey) {
        $this->turkey = $turkey;
    }

    public function quack()
    {
        return $this->turkey->gobble();
    }

    public function fly()
    {   $ret = '';
        for ($i=0;$i<2;$i++) {
            $ret .= $this->turkey->fly();
        }
        return $ret.'<br>';
    }
}