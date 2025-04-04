<?php
declare(strict_types=1);

namespace App\Model\WeatherApi;

class Forecast
{
    /**
     * @var ForecastDay[]
     */
    public ?array $forecastday = null;
}
