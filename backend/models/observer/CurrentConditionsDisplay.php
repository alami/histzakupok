<?php


namespace backend\models\observer;


class CurrentConditionsDisplay implements Observer, DisplayElement
{
    /*
     * @var float temperature;
     * @var float humidity;
     * @var Subject weatherData;
     */
    private $temperature;
    private $humidity;
    private $weatherData;

    public function __construct(Subject $weatherData)
    {
        $this->weatherData = $weatherData;
    }

    public function update(float $temperature, float $humidity, float $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        return $this->display();
    }

    public function display()
    {
        return "Current conditions: " . $this->temperature
            . "F degrees and " . $this->humidity  . " humidity" ;
    }
}