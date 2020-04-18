<?php

namespace backend\models\command;

use backend\models\command\Command;
use backend\models\command\Door;
use yii\helpers\VarDumper;

class GarageDoorOpenCommand implements Command
{
    public $door; //Door

    /**
     * LightOnCommand constructor.
     * @param GarageDoor $door
     */
    public function __construct(GarageDoor $door)
    {
        $this->door = $door;
    }

    public function execute()
    {
        return $this->door->open();
    }
}