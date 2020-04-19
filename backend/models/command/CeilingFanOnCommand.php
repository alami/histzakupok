<?php

namespace backend\models\command;

use backend\models\command\CeilingFan;
use backend\models\command\Command;
use yii\helpers\VarDumper;

class CeilingFanOnCommand implements Command
{
    public $ceilingFan; //Light

    public function __construct(CeilingFan $ceilingFan)
    {
        $this->ceilingFan = $ceilingFan;
    }

    public function execute()
    {
        return $this->ceilingFan->on();
    }
}