<?php

namespace backend\models\fasad;

class HomeTheaterFacade
{
    public $amp;  //Amplifier
    public $tuner;  //Tuner
    public $dvd;  //DvdPlayer
    public $cd;  //CdPlayer
    public $projector;  //Projector
    public $lights;  //TheaterLights
    public $screen;  //Screen
    public $popper;  //PopcornPopper

    public function __construct(
        Amplifier $amp,
        Tuner $tuner,
        DvdPlayer $dvd,
        CdPlayer $cd,
        Projector $projector,
        Screen $screen,
        TheaterLights $lights,
        PopcornPopper $popper
    )
    {
        $this->amp = $amp;
        $this->tuner = $tuner;
        $this->dvd = $dvd;
        $this->cd = $cd;
        $this->projector = $projector;
        $this->screen = $screen;
        $this->lights = $lights;
        $this->popper = $popper;
    }
}