<?php

namespace backend\models\observer;


interface Observer
{
    public function update(float $temp, float $humidity, float $pressure);
}