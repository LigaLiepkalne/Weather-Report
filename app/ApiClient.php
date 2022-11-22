<?php declare (strict_types = 1);

namespace App;

class ApiClient
{
  private string $apiKey;

  public function __construct(string $apiKey)
  {
    $this->apiKey = $apiKey;
  }

  public function getCityWeather(string $city): WeatherData
  {
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$this->apiKey}&units=metric";
    $data = json_decode(file_get_contents($apiUrl), true);

    return new WeatherData($city,
      $data["main"]["temp"] ?? 0,
      $data["main"]["feels_like"] ?? 0,
      $data["main"]["temp_max"] ?? 0,
      $data["main"]["temp_min"] ?? 0,
      $data["weather"][0]["description"] ?? 0,
      $data["wind"]["speed"] ?? 0,
      $data["main"]["pressure"] ?? 0,
      $data["main"]["humidity"] ?? 0,
      $data["weather"][0]["icon"] ?? 0);
  }
}