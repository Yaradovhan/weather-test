<?php
declare(strict_types=1);

namespace App\Model\WeatherApi;

class Hour
{
    /**
     * @var int|null
     */
    public ?int $time_epoch = null;

    /**
     * @var string|null
     */
    public ?string $time = null;

    /**
     * @var float|null
     */
    public ?float $temp_c = null;

    /**
     * @var float|null
     */
    public ?float $temp_f = null;

    /**
     * @var int|null
     */
    public ?int $is_day = null;

    /**
     * @var Condition|null
     */
    public ?Condition $condition = null;

    /**
     * @var float|null
     */
    public ?float $wind_mph = null;

    /**
     * @var float|null
     */
    public ?float $wind_kph = null;

    /**
     * @var int|null
     */
    public ?int $wind_degree = null;

    /**
     * @var string|null
     */
    public ?string $wind_dir = null;

    /**
     * @var float|null
     */
    public ?float $pressure_mb = null;

    /**
     * @var float|null
     */
    public ?float $pressure_in = null;

    /**
     * @var float|null
     */
    public ?float $precip_mm = null;

    /**
     * @var float|null
     */
    public ?float $precip_in = null;

    /**
     * @var float|null
     */
    public ?float $snow_cm = null;

    /**
     * @var int|null
     */
    public ?int $humidity = null;

    /**
     * @var int|null
     */
    public ?int $cloud = null;

    /**
     * @var float|null
     */
    public ?float $feelslike_c = null;

    /**
     * @var float|null
     */
    public ?float $feelslike_f = null;

    /**
     * @var float|null
     */
    public ?float $windchill_c = null;

    /**
     * @var float|null
     */
    public ?float $windchill_f = null;

    /**
     * @var float|null
     */
    public ?float $heatindex_c = null;

    /**
     * @var float|null
     */
    public ?float $heatindex_f = null;

    /**
     * @var float|null
     */
    public ?float $dewpoint_c = null;

    /**
     * @var float|null
     */
    public ?float $dewpoint_f = null;

    /**
     * @var int|null
     */
    public ?int $will_it_rain = null;

    /**
     * @var int|null
     */
    public ?int $chance_of_rain = null;

    /**
     * @var int|null
     */
    public ?int $will_it_snow = null;

    /**
     * @var int|null
     */
    public ?int $chance_of_snow = null;

    /**
     * @var float|null
     */
    public ?float $vis_km = null;

    /**
     * @var float|null
     */
    public ?float $vis_miles = null;

    /**
     * @var float|null
     */
    public ?float $gust_mph = null;

    /**
     * @var float|null
     */
    public ?float $gust_kph = null;

    /**
     * @var float|null
     */
    public ?float $uv = null;
}
