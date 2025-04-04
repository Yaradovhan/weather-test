# Weather Test Job

This project provides weather data endpoints using a Symfony-based service that consumes a third-party weather API. It demonstrates how to fetch and render current, forecast, historical, and future weather information.

## Endpoints

- **Current Weather**  
  **URL:** `domain/weather/{city}`  
  **Description:** Shows the current day's weather for the specified city.

- **Weather Forecast**  
  **URL:** `domain/weather/{city}/{days}`  
  **Description:** Shows weather forecast for the specified city for the number of days provided.

- **Historical Weather**  
  **URL:** `domain/weather/history/{city}/{date}`  
  **Description:** Shows historical weather data for the specified city on the given date (format: `yyyy-MM-dd`).

- **Future Weather**  
  **URL:** `domain/weather/future/{city}/{date}`  
  **Description:** Shows forecasted weather data for the specified city for a future date (format: `yyyy-MM-dd`). The date must be between 14 and 300 days from today.

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/weather-test-job.git application
   cd application
