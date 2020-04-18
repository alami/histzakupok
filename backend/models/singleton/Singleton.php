<?php


namespace backend\models\singleton;


class Singleton
{
    private static $uniqueInstance; //Singleton

    private function Singleton()     {}

    public static function getInstance(): Singleton
    {
        if (self::$uniqueInstance == null) {
            self::$uniqueInstance = new Singleton();
        }
        return self::$uniqueInstance;
    }
}