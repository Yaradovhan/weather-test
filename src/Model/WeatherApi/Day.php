<?php
declare(strict_types=1);

namespace App\Model\WeatherApi;

class Day
{
    /**
     * @var float|null
     */
    public ?float $maxtemp_c = null;

    /**
     * @var float|null
     */
    public ?float $maxtemp_f = null;

    /**
     * @var float|null
     */
    public ?float $mintemp_c = null;

    /**
     * @var float|null
     */
    public ?float $mintemp_f = null;

    /**
     * @var float|null
     */
    public ?float $avgtemp_c = null;

    /**
     * @var float|null
     */
    public ?float $avgtemp_f = null;

    /**
     * @var float|null
     */
    public ?float $maxwind_mph = null;

    /**
     * @var float|null
     */
    public ?float $maxwind_kph = null;

    /**
     * @var float|null
     */
    public ?float $totalprecip_mm = null;

    /**
     * @var float|null
     */
    public ?float $totalprecip_in = null;

    /**
     * @var float|null
     */
    public ?float $totalsnow_cm = null;

    /**
     * @var float|null
     */
    public ?float $avgvis_km = null;

    /**
     * @var float|null
     */
    public ?float $avgvis_miles = null;

    /**
     * @var int|float|null
     */
    public int|float|null $avghumidity = null;

    /**
     * @var int|null
     */
    public ?int $daily_will_it_rain = null;

    /**
     * @var int|null
     */
    public ?int $daily_chance_of_rain = null;

    /**
     * @var int|null
     */
    public ?int $daily_will_it_snow = null;

    /**
     * @var int|null
     */
    public ?int $daily_chance_of_snow = null;

    /**
     * @var Condition|null
     */
    public ?Condition $condition = null;

    /**
     * @var float|null
     */
    public ?float $uv = null;
}
