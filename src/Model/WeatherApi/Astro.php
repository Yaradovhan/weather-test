<?php

namespace App\Model\WeatherApi;

class Astro
{
    /**
     * @var string|null
     */
    public ?string $sunrise = null;

    /**
     * @var string|null
     */
    public ?string $sunset = null;

    /**
     * @var string|null
     */
    public ?string $moonrise = null;

    /**
     * @var string|null
     */
    public ?string $moonset = null;

    /**
     * @var string|null
     */
    public ?string $moon_phase = null;

    /**
     * @var int|null
     */
    public ?int $moon_illumination = null;

    /**
     * @var int|null
     */
    public ?int $is_moon_up = null;

    /**
     * @var int|null
     */
    public ?int $is_sun_up = null;

}
