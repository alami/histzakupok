<?php

namespace backend\models\observer;

class WeatherData implements Subject
{
    private $observers;//ArrayList
    private $temperature;
    private $humidity;
    private $pressure;

    public function __construct()
    {
        $this->observers = [];
    }

    public function registerObserver(Observer $o)
    {
        array_push($this->observers, $o);
    }

    public function removeObserver(Observer $o)
    {
        foreach ($this->observers as $k => $v) {
            if ($v === $o) {
                unset($this->observers[$k]);
                array_values($this->observers);
                return true;
            }
            return false;
        }
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $k => $v) {
            $observer = $this->observers[$k]; //(Observer)
            $observer->update(temperature, humidity, pressure);
        }
    }

    public function measurementsChanged()
    {
        $this->notifyObservers();
    }

    public function setMeasurements(float $temperature, float $humidity, float $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function getHumidity()
    {
        return $this->humidity;
    }

    public function getPressure()
    {
        return $this->pressure;
    }
}