<?php
declare(strict_types=1);

namespace App\Model\WeatherApi;

class Location
{
    /**
     * @var string|null
     */
    public ?string $name = null;

    /**
     * @var string|null
     */
    public ?string $region = null;

    /**
     * @var string|null
     */
    public ?string $country = null;

    /**
     * @var float|null
     */
    public ?float $lat = null;

    /**
     * @var float|null
     */
    public ?float $lon = null;

    /**
     * @var string|null
     */
    public ?string $tz_id = null;

    /**
     * @var int|null
     */
    public ?int $localtime_epoch = null;

    /**
     * @var string|null
     */
    public ?string $localtime = null;
}
