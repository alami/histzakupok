<?php

namespace backend\models\command;

class Stereo
{
    public function on()
    {
        return "Stereo on ..<br>";
    }
    public function off()
    {
        return "Stereo off ..<br>";
    }
    public function setCD() {
        return "Stereo set CD ..<br>";
    }
    public function setVolume($i) {
        return "Stereo set Volume ..<br>";
    }

}