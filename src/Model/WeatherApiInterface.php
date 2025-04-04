<?php
declare(strict_types=1);

namespace App\Model;

use App\Model\WeatherApi\Current;
use App\Model\WeatherApi\Forecast;
use App\Model\WeatherApi\Location;

interface WeatherApiInterface
{
    /**
     * @return Location|null
     */
    public function getLocation(): ?Location;

    /**
     * @param Location|null $location
     *
     * @return self
     */
    public function setLocation(?Location $location): self;

    /**
     * @return Current|null
     */
    public function getCurrent(): ?Current;

    /**
     * @param Current|null $current
     *
     * @return self
     */
    public function setCurrent(?Current $current): self;

    /**
     * @return Forecast|null
     */
    public function getForecast(): ?Forecast;

    /**
     * @param Forecast|null $forecast
     *
     * @return self
     */
    public function setForecast(?Forecast $forecast): self;

    /**
     * @return string|null
     */
    public function getError(): ?string;

    /**
     * @param string|null $error
     *
     * @return self
     */
    public function setError(?string $error): self;
}
