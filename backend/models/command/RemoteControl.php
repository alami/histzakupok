<?php

namespace backend\models\command;

use yii\helpers\VarDumper;

class RemoteControl
{
    public $onCommands =[]; //Commmand
    public $offCommands=[];
    public function __construct()
    {
//        $this->onCommands[] = new Command();
//        $this->onCommands[] = new Command();
        $noCommand = new NoCommand();
        for ($i=0;$i<7;$i++) {
            $this->onCommands[$i] = $noCommand;
            $this->offCommands[$i] = $noCommand;
        }
    }
    public function setCommand(int $slot, Command $onCommand, Command $offCommand) {
        $this->onCommands[$slot]  = $onCommand;
        $this->offCommands[$slot] = $offCommand;
    }
    public function onButtonWasPushed(int $slot) {
        return $this->onCommands[$slot]->execute();
    }
    public function offButtonWasPushed(int $slot) {
        return $this->offCommands[$slot]->execute();
    }
    public function toString(){
        $stringBuff = "------ Remote Control -------\n<br>";

        for ($i = 0; $i < count($this->onCommands); $i++) {
            $stringBuff .= "[slot ".$i." ]"
                /*.$this->onCommands[$i]." ".$this->offCommands[$i]*/.'<br>';
        }
        return $stringBuff;
    }
}