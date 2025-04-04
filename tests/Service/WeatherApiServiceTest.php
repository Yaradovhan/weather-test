<?php

namespace App\Tests\Service;

use App\Model\WeatherApi\Current;
use App\Model\WeatherApi\Forecast;
use App\Model\WeatherApi\Location;
use PHPUnit\Framework\TestCase;
use App\Model\WeatherApiInterface;
use App\Service\WeatherApiService;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

class WeatherApiServiceTest extends TestCase
{
    public function testHandleSuccessfulResponse(): void
    {
        // This is the JSON response returned from the HTTP client.
        $jsonResponse = '{"location":{"name":"London"},"current":{"temp_c":15}}';

        // Create a stub for WeatherApiInterface using an anonymous class.
        $weatherApiStub = new class implements WeatherApiInterface {
            private ?Location $location = null;
            private ?Current $current = null;
            private ?Forecast $forecast = null;
            private ?string $error = null;

            public function getLocation(): ?Location
            {
                return $this->location;
            }
            public function setLocation(?Location $location): WeatherApiInterface
            {
                $this->location = $location;
                return $this;
            }
            public function getCurrent(): ?Current
            {
                return $this->current;
            }
            public function setCurrent(?Current $current): WeatherApiInterface
            {
                $this->current = $current;
                return $this;
            }
            public function getForecast(): ?Forecast
            {
                return $this->forecast;
            }
            public function setForecast(?Forecast $forecast): WeatherApiInterface
            {
                $this->forecast = $forecast;
                return $this;
            }
            public function getError(): ?string
            {
                return $this->error;
            }
            public function setError(?string $error): WeatherApiInterface
            {
                $this->error = $error;
                return $this;
            }
        };

        // Create a mock for the HTTP response that returns our JSON response.
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getContent')->willReturn($jsonResponse);

        // Create a mock for the HTTP client to return the response mock.
        $clientMock = $this->createMock(HttpClientInterface::class);
        $clientMock->method('request')->willReturn($responseMock);

        // Create a mock for the logger; in a successful case, the logger should not log any error.
        $loggerMock = $this->createMock(LoggerInterface::class);
        $loggerMock->expects($this->never())->method('error');

        // Create a mock for the serializer.
        // Expect that the deserialize method is called with the JSON response, the class of the weatherApiStub, and the 'json' format.
        $serializerMock = $this->createMock(SerializerInterface::class);
        $serializerMock->expects($this->once())
            ->method('deserialize')
            ->with($jsonResponse, get_class($weatherApiStub), 'json')
            ->willReturn($weatherApiStub);

        // Instantiate the WeatherApiService with all dependencies.
        $service = new WeatherApiService(
            $clientMock,
            'dummy_api_key',
            'https://api.weatherapi.com/',
            'v1',
            $loggerMock,
            $serializerMock,
            $weatherApiStub
        );

        // Set URL using one of the helper methods (for example, current()).
        $service->current('London');

        // Call the handle() method and verify that it returns the expected WeatherApiInterface stub.
        $result = $service->handle();
        $this->assertSame($weatherApiStub, $result);
    }
}