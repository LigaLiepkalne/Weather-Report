<?php
declare (strict_types=1);

require_once "vendor/autoload.php";

use App\ApiClient;
use App\CityCollection;
use AsciiTable\Builder;

$apiClient = new ApiClient("bc888cebe0b19daf6284e6ed4bd3d141");
$weatherReport = $apiClient->getCityWeather(readline("Please enter city name: "));


$builder = new Builder();

$builder->addRows([
  [
    'Temperature' => round($weatherReport->getTemperature()) . " °C",
    'Feels like' => round($weatherReport->getfeelsLike()) . " °C",
    'Max' => round($weatherReport->getMax()) . " °C",
    'Min' => round($weatherReport->getMin()) . " °C",
    'Sky' => $weatherReport->getSky(),
    'Wind speed' => round($weatherReport->getWindSpeed()) . " m/s",
    'Atmospheric pressure' => $weatherReport->getPressure() . " hPa",
    'Humidity' => $weatherReport->getHumidity() . "%",
  ]]);

$builder->setTitle("WEATHER REPORT FOR " . strtoupper($weatherReport->getCity() . " " . date('m/d/Y h:i:s a', time())));

echo $builder->renderTable();
echo PHP_EOL;