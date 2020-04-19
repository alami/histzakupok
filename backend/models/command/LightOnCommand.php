<?php

namespace backend\models\command;

use backend\models\command\Command;
use backend\models\command\Light;
use yii\helpers\VarDumper;

class LightOnCommand implements Command
{
    public $light; //Light

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute()
    {
        return $this->light->on();
    }

    public function undo()
    {
        return $this->light->off();
    }
}