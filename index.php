<?php declare (strict_types = 1);

require_once "vendor/autoload.php";

use App\WeatherData;
use AsciiTable\Builder;

$report = new WeatherData("-", readline("Please enter city name: "));
$builder = new Builder();

$builder->addRows([
  [
    'Temperature' => round($report->getData()["main"]["temp"])." °C",
    'Feels like' => round($report->getData()["main"]["feels_like"])." °C",
    'Max' => round($report->getData()["main"]["temp_max"])." °C",
    'Min' => round($report->getData()["main"]["temp_min"])." °C",
    'Sky' => $report->getData()["weather"][0]["description"],
    'Wind speed' => round($report->getData()["wind"]["speed"])." m/s",
    'Atmospheric pressure' => $report->getData()["main"]["pressure"]." hPa",
    'Humidity' => $report->getData()["main"]["humidity"]."%",
  ]]);

$builder->setTitle("WEATHER REPORT FOR " . strtoupper($report->getCity() . " " . date('m/d/Y h:i:s a', time())));

echo $builder->renderTable();
echo PHP_EOL;