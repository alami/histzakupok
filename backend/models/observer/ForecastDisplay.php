<?php


namespace backend\models\observer;


class ForecastDisplay implements Observer, DisplayElement
{
    private $currentPressure = 29.92;
    private $lastPressure;

    public function __construct(WeatherData $weatherData)
    {
    }

    public function display()
    {
        // TODO: Implement display() method.
    }

    public function update(float $temp, float $humidity, float $pressure)
    {
        // TODO: Implement update() method.
    }
}