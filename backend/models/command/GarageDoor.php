<?php

namespace backend\models\command;

class GarageDoor
{
    public function open()
    {
        return "door open ..<br>";
    }
    public function close()
    {
        return "door close ..<br>";
    }
}