<?php declare (strict_types=1);

require_once "vendor/autoload.php";

use App\ApiClient;

$apiClient = new ApiClient("bc888cebe0b19daf6284e6ed4bd3d141");
$city = $_GET["city"] ?? 'Riga';
$weatherReport = $apiClient->getCityWeather($city);
$icon = $weatherReport->getIcon();

if (isset($_GET['submit'])) {
  $city = $_GET['city'];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEATHER FORECAST</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,500,700|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="wrapper">
    <div class="form">
        <form method="get" action="">
            <label>
                <input type="text" class="text" placeholder="Enter city name" name="city" required value="<?php echo $city ?>"/>
            </label>
            <input class="form-submit-button" type="submit" value="Submit " name="submit" required>
        </form>
    </div>
    <div class="float-container">
        <img class="icon" src="https://openweathermap.org/img/wn/<?php echo $icon ?>@4x.png" alt="Weather icon"/>
        <div class="text">
        <p><?php echo $weatherReport->getCity(); ?> </p>
        <p><?php echo date("F j g:i a"); ?> </p>
            </div>
    </div>
    <ul class="widget">
        <li>
            <span class="category">TEMPERATURE </span>
            <span class="value"><?php echo round($weatherReport->getTemperature()) . " °C"; ?></span>
        </li>
        <li>
            <span class="category">FEELS LIKE</span>
            <span class="value"><?php echo round($weatherReport->getfeelsLike()) . " °C" ?></span>
        </li>
        <li>
            <span class="category">SKY</span>
            <span class="value"><?php echo $weatherReport->getSky(); ?></span>
        </li>
        <li>
            <span class="category">WIND SPEED</span>
            <span class="value"><?php echo round($weatherReport->getWindSpeed()) . " m/s"; ?></span>
        </li>
        <li>
            <span class="category">PRESSURE</span>
            <span class="value"><?php echo $weatherReport->getPressure() . " hPa"; ?></span>
        </li>
        <li>
            <span class="category">HUMIDITY</span>
            <span class="value"><?php echo $weatherReport->getHumidity() . "%"; ?></span>
        </li>
    </ul>
</div>
</body>
</html>
