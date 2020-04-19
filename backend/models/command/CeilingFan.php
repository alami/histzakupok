<?php

namespace backend\models\command;

use backend\models\command\Command;

class CeilingFan  implements Command
{
    public $ceilingFan;
    public function on()
    {
        return "CeilingFan on ..<br>";
    }
    public function off()
    {
        return "CeilingFan off ..<br>";
    }

    public function execute()
    {
        return $this->ceilingFan->off();
    }
}