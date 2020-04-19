<?php


namespace backend\models\command;


class StereoOffCommand implements Command
{
    public $stereo;
    public function __construct(Stereo $stereo)
    {
        $this->stereo = $stereo;
    }

    public function execute()
    {
        return $this->stereo->off();
    }
}