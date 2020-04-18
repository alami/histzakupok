<?php

namespace backend\models\command;

class Light
{
    public function on()
    {
        return "light on ..<br>";
    }
    public function off()
    {
        return "light off ..<br>";
    }
}