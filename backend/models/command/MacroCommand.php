<?php


namespace backend\models\command;


use yii\helpers\VarDumper;

class MacroCommand implements Command
{
    public $commands = [];
    public function __construct( $commands) //Command[]
    { $this->commands = $commands;
    }

    public function execute()
    {
        $ret = '';
        for ($i=0;$i<count($this->commands);$i++) {
            $ret .= $this->commands[$i]->execute();
        }
        return $ret;
    }
}