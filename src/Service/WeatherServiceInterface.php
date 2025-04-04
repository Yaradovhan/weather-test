<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\WeatherApiInterface;

interface WeatherServiceInterface
{
    /**
     * @return WeatherApiInterface
     */
    public function handle(): WeatherApiInterface;

    /**
     * @param string $city
     *
     * @return mixed
     */
    public function current(string $city);

    /**
     * @param string $city
     * @param int $days
     *
     * @return mixed
     */
    public function forecast(string $city, int $days);

    /**
     * @param string $city
     * @param string $date
     *
     * @return mixed
     */
    public function history(string $city, string $date);

    /**
     * @param string $city
     * @param string $date
     *
     * @return mixed
     */
    public function future(string $city, string $date);
}
