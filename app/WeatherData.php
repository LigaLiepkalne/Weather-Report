<?php declare (strict_types = 1);

namespace App;

class WeatherData
{
  private string $city;
  private float $temperature;
  private float $feelsLike;
  private float $max;
  private float $min;
  private string $sky;
  private float $windSpeed;
  private int $pressure;
  private int $humidity;
  private string $icon;

  public function __construct(string $city,
                              float $temperature,
                              float $feelsLike,
                              float $max,
                              float $min,
                              string $sky,
                              float $windSpeed,
                              int $pressure,
                              int $humidity,
                              string $icon)
  {
    $this->city = $city;
    $this->temperature = $temperature;
    $this->feelsLike = $feelsLike;
    $this->max = $max;
    $this->min = $min;
    $this->sky = $sky;
    $this->windSpeed = $windSpeed;
    $this->pressure = $pressure;
    $this->humidity = $humidity;
    $this->icon = $icon;
  }

  public function getCity(): string
  {
    return $this->city;
  }

  public function getTemperature(): float
  {
    return $this->temperature;
  }

  public function getfeelsLike(): float
  {
    return $this->feelsLike;
  }

  public function getMax(): float
  {
    return $this->max;
  }

  public function getMin(): float
  {
    return $this->min;
  }

  public function getSky(): string
  {
    return $this->sky;
  }

  public function getWindSpeed(): float
  {
    return $this->windSpeed;
  }

  public function getPressure(): int
  {
    return $this->pressure;
  }

  public function getHumidity(): int
  {
    return $this->humidity;
  }

  public function getIcon(): string
  {
    return $this->icon;
  }
}
