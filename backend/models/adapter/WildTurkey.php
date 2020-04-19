<?php


namespace backend\models\adapter;


class WildTurkey implements Turkey
{
    public function gobble()
    {
        return "Gobble gobble<br>";    }

    public function fly()
    {
        return "I’m flying a short distance<br>";
    }
}