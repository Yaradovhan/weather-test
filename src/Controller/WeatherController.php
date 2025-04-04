<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\WeatherApiInterface;
use App\Service\WeatherServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WeatherController extends AbstractController
{
    public function __construct(
        private readonly WeatherServiceInterface $weatherService
    ) {}

    /**
     * Show weather for city on current day
     */
    #[Route('weather/{city}', name: 'weather_city')]
    public function weatherCurrent(Request $request, string $city): Response
    {
        /** @var WeatherApiInterface $weatherData */
        $weatherData = $this->weatherService->current($city)->handle();

        if ($weatherData->getError()) {
            $this->addFlash('error', $weatherData->getError());
        }

        return $this->render('weather/index.html.twig', [
            'weatherData' => $weatherData,
            'city' => $city,
        ]);
    }

    /**
     * Show weather for city on a few days
     */
    #[Route('weather/{city}/{days}', name: 'weather_forecast')]
    public function weatherForecast(Request $request, string $city, int $days): Response
    {
        /** @var WeatherApiInterface $weatherData */
        $weatherData = $this->weatherService->forecast($city, $days)->handle();

        if ($weatherData->getError()) {
            $this->addFlash('error', $weatherData->getError());
        }

        return $this->render('weather/index.html.twig', [
            'weatherData' => $weatherData,
            'city' => $city,
        ]);
    }

    /**
     * Show history weather for the city
     * Date on or after 1st Jan, 2010 in yyyy-MM-dd format (ex. '2015-01-01')
     */
    #[Route('weather/history/{city}/{days}', name: 'weather_history')]
    public function weatherHistory(Request $request, string $city, string $days): Response
    {
        /** @var WeatherApiInterface $weatherData */
        $weatherData = $this->weatherService->history($city, $days)->handle();

        if ($weatherData->getError()) {
            $this->addFlash('error', $weatherData->getError());
        }

        return $this->render('weather/index.html.twig', [
            'weatherData' => $weatherData,
            'city' => $city,
        ]);
    }

    /**
     * Show future weather for the city
     * Date between 14 days and 300 days from today in the future in yyyy-MM-dd format (ex. '2025-10-10')
     */
    #[Route('weather/future/{city}/{days}', name: 'weather_future')]
    public function weatherFuture(Request $request, string $city, string $days): Response
    {
        /** @var WeatherApiInterface $weatherData */
        $weatherData = $this->weatherService->future($city, $days)->handle();

        if ($weatherData->getError()) {
            $this->addFlash('error', $weatherData->getError());
        }

        return $this->render('weather/index.html.twig', [
            'weatherData' => $weatherData,
            'city' => $city,
        ]);
    }
}
