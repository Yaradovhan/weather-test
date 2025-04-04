<?php
declare(strict_types=1);

namespace App\Model\WeatherApi;

class Condition
{
    /**
     * @var string|null
     */
    public ?string $text = null;

    /**
     * @var string|null
     */
    public ?string $icon = null;

    /**
     * @var int|null
     */
    public ?int $code = null;
}
