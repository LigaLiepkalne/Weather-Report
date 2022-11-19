<?php declare (strict_types = 1);

namespace App;

class WeatherData
{
  private string $apiKey;
  private string $city;

  public function __construct(string $apiKey, string $city)
  {
    $this->apiKey = $apiKey;
    $this->city = $city;
  }

  public function getCity(): string
  {
    return $this->city;
  }

  public function getData(): array
  {
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$this->city}&appid={$this->apiKey}&units=metric";
    return json_decode(file_get_contents($apiUrl), true);
  }
}
