<?php


namespace backend\models\command;


class StereoOnWithCDCommand implements Command
{
    public $stereo;
    public function __construct(Stereo $stereo)
    {
        $this->stereo = $stereo;
    }

    public function execute()
    {
        return $this->stereo->on().
        $this->stereo->setCD().
        $this->stereo->setVolume(11);
    }
}