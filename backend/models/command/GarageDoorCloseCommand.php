<?php

namespace backend\models\command;

use backend\models\command\Command;
use backend\models\command\Door;
use yii\helpers\VarDumper;

class GarageDoorCloseCommand implements Command
{
    public $door; //GarageDoor
    public function __construct(GarageDoor $door)
    {
        $this->door = $door;
    }

    public function execute()
    {
        return $this->door->close();
    }
}