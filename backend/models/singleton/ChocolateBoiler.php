<?php


namespace backend\models\singleton;


class ChocolateBoiler
{
    private static $chocolateBoiler;
    private $empty;
    private $boiled;
    private function __construct()
    {
        $this->empty = true;
        $this->boiled = true;
    }
    public static function getInstance(): ChocolateBoiler
    {
        if (self::$chocolateBoiler == null)
            self::$chocolateBoiler = new ChocolateBoiler();
        return  self::$chocolateBoiler;
    }
    public function fill(){
        if (isEmpty()) {
            $this->empty = false;
            $this->boiled = false;
        }
    }
    public function drain () {
        if (!$this->isEmpty() && !$this->isBoiled())    {
            $this->empty = true;
        }
    }
    public function boil () {
        if (!$this->isEmpty() && !$this->isBoiled())    {
            $this->boiled = true;
        }
    }
    public function isEmpty(){
        return $this->empty;
    }
    public function isBoiled(){
        return $this->boiled;
    }
}