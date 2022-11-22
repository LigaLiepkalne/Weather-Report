<?php declare (strict_types = 1);

namespace App;

class CityCollection
{
  private array $cities = [];

  public function __construct(array $cities = [])
  {
    foreach ($cities as $city) {
      $this->add($city);
    }
  }

  public function add(WeatherData $cityReport): void
  {
    $this->cities [] = $cityReport;
  }

  public function getAll(): array
  {
    return $this->cities;
  }
}

