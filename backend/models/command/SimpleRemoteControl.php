<?php


namespace backend\models\command;

use backend\models\command\Command;
use yii\helpers\VarDumper;

class SimpleRemoteControl
{
    public $slot; //Command

    public function __construct() { }

    public function setCommand(Command $command)
    {
        $this->slot = $command;
    }

    public function buttonWasPressed()
    {
        return $this->slot->execute();
    }
}