<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'OpenWeather.php';
$meteo = new OpenWeather('3a1680017f33e7297cfefd94b672822d');
$results = $meteo->getForecast('Trebeurden', 'fr');
?>

<h1>Meteo à Trébeurden:</h1>

<p><?= $results['date']->format('d/m/Y') . ': ' . $results['description'] . ' - ' . $results['temp']?></p>
