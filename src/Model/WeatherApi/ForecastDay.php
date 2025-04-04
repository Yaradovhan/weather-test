<?php
declare(strict_types=1);

namespace App\Model\WeatherApi;

class ForecastDay
{
    public ?string $date = null;

    /**
     * @var int|null
     */
    public ?int $date_epoch = null;

    /**
     * @var Day|null
     */
    public ?Day $day = null;

    /**
     * @var Astro|null
     */
    public ?Astro $astro = null;

    /**
     * @var Hour[]|null
     */
    public ?array $hour = null;
}
