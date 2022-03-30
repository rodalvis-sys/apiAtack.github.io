<?php
function getLocation($lat, $long){
    $url = "http://api.geonames.org/countryCodeJSON?lat=" . $lat . "&lng=" . $long . "&username=prueba";
    $json = @file_get_contents($url);
    $data = json_decode($json);
    return $data;
}