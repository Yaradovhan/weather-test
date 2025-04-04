<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\WeatherApiInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Throwable;

readonly class WeatherApiService implements WeatherServiceInterface
{
    private string $url;

    public function __construct(
        private HttpClientInterface $client,
        private string              $apiKey,
        private string              $apiHost,
        private string              $apiVersion,
        private LoggerInterface     $logger,
        private SerializerInterface $serializer,
        private WeatherApiInterface $weatherApi
    ) {}

    /**
     * Execute request URL with get params
     */
    public function handle(): WeatherApiInterface
    {
        try {
            $response = $this->client->request('GET', $this->url, [
                'timeout' => 30,
            ]);
            $result = $response->getContent();

        } catch (TransportExceptionInterface $e) {
            $this->logger->error('HTTP Request error: ' . $e->getMessage());

            $result = json_encode(['error' => 'HTTP Request error: ' . $e->getMessage()]);
        } catch (Throwable $e) {
            $this->logger->error('Unexpected error: ' . $e->getMessage());

            $result = json_encode(['error' => 'Unexpected error: ' . $e->getMessage()]);
        }

        return $this->serializer->deserialize($result, $this->weatherApi::class, 'json');
    }

    public function current(string $city): self
    {
        $this->url = sprintf( $this->apiHost.$this->apiVersion.'/current.json?key=%s&q=%s', $this->apiKey, $city);

        return $this;
    }

    public function forecast(string $city, int $days): self
    {
        $this->url = sprintf( $this->apiHost.$this->apiVersion.'/forecast.json?key=%s&q=%s&days=%s', $this->apiKey, $city, $days);

        return $this;
    }

    /**
     * Date on or after 1st Jan, 2010 in yyyy-MM-dd format
     *
     * @return $this
     */
    public function history(string $city, string $date): self
    {
        $this->url = sprintf( $this->apiHost.$this->apiVersion.'/history.json?key=%s&q=%s&dt=%s', $this->apiKey, $city, $date);

        return $this;
    }

    /**
     * Date between 14 days and 300 days from today in the future in yyyy-MM-dd format
     *
     * @return $this
     */
    public function future(string $city, string $date): self
    {
        $this->url = sprintf( $this->apiHost.$this->apiVersion.'/future.json?key=%s&q=%s&dt=%s', $this->apiKey, $city, $date);

        return $this;
    }
}