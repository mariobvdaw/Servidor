<!DOCTYPE html>
<html lang="en">

</html>
<?php

$uri = "http://dataservice.accuweather.com/forecasts/v1/daily/1day/303121?apikey=iqnJLAq5jN6HAZCPiiYQP1H0n7uzZUMY&language=es-es";


$contenido = file_get_contents($uri);
echo '<pre>';
if ($contenido) {
    $jsonContenido = json_decode($contenido, true);
    // print_r($jsonContenido);
}
$f = (int) $jsonContenido['DailyForecasts'][0]['Temperature']['Minimum']['Value'];
$gradosMin = ($f - 32) * 5 / 9;
$gradosMax = ($jsonContenido['DailyForecasts'][0]['Temperature']['Maximum']['Value'] - 32) * 5 / 9;

echo 'La temperatura minima es: ' . $gradosMin;
echo '<br>';
echo 'La temperatura minima es: ' . $gradosMax;
?>