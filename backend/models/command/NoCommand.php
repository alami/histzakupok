<?php

namespace backend\models\command;

class NoCommand implements Command
{
    public function execute()  {
        return '<font color=red>..No command</font>';
    }
}