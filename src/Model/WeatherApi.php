<?php
declare(strict_types=1);

namespace App\Model;

use App\Model\WeatherApi\Current;
use App\Model\WeatherApi\Forecast;
use App\Model\WeatherApi\Location;

class WeatherApi implements WeatherApiInterface
{
    private ?Location $location = null;
    private ?Current $current = null;
    private ?Forecast $forecast = null;
    private ?string $error = null;

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): WeatherApiInterface
    {
        $this->location = $location;

        return $this;
    }

    public function getCurrent(): ?Current
    {
        return $this->current;
    }

    public function setCurrent(?Current $current): WeatherApiInterface
    {
        $this->current = $current;

        return $this;
    }

    public function getForecast(): ?Forecast
    {
        return $this->forecast;
    }
    public function setForecast(?Forecast $forecast): WeatherApiInterface
    {
        $this->forecast = $forecast;

        return $this;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function setError(?string $error): WeatherApiInterface
    {
        $this->error = $error;

        return $this;
    }
}
