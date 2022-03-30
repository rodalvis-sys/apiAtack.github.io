<?php
include 'plantilla.php';
function getAtaques()
{
    $ataque = curl_init();
    curl_setopt($ataque, CURLOPT_URL, 'http://localhost/web/Tarea8web/api/read.php');
    curl_setopt($ataque, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ataque, CURLOPT_HEADER, 0);
    $data = curl_exec($ataque);
    curl_close($ataque);
    $dev = json_decode($data);
    return $dev;
}

function editAtaques($id, $Fecha, $Hora, $Ciudad, $Latitud, $Longitud, $Tipo, $Muertos, $Heridos, $Daños, $Autor)
{
    $data = array("id" => $id, "Fecha" => $Fecha, "Hora" => $Hora, "Ciudad" => $Ciudad, "Latitud" => $Latitud, "Longitud" => $Longitud, "Tipo" => $Tipo, "Muertos" => $Muertos, "Heridos" => $Heridos, "Total_daños" => $Daños, "Autor" => $Autor);
    $data_json = json_encode($data);
    $url = 'http://localhost/web/Tarea8web/api/update.php';
    $ataque = curl_init();
    curl_setopt($ataque, CURLOPT_URL, $url);
    curl_setopt($ataque, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_json)));
    curl_setopt($ataque, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ataque, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ataque, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ataque);
    curl_close($ataque);
}

function elimAtaques($id)
{

    $data = array("id" => $id);
    $data_json = json_encode($data);
    $url = 'http://localhost/web/Tarea8web/api/delete.php';
    $ataque = curl_init();
    curl_setopt($ataque, CURLOPT_URL, $url);
    curl_setopt($ataque, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_json)));
    curl_setopt($ataque, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ataque, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ataque, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ataque);
    curl_close($ataque);
}

function NuevoAtaques($Fecha, $Hora, $Ciudad, $Latitud, $Longitud, $Tipo, $Muertos, $Heridos, $Daños, $Autor)
{
    
    $url = "http://localhost/web/Tarea8web/api/create.php";
    $data = array("Fecha" => $Fecha,"Hora" => $Hora,"Ciudad" => $Ciudad, "Latitud" => $Latitud, "Longitud" => $Longitud, "Tipo" => $Tipo, "Muertos" => $Muertos, "Heridos" => $Heridos, "Total_daños" => $Daños, "Autor" => $Autor);
    $data = json_encode($data);
    $ataque = curl_init();
    curl_setopt($ataque, CURLOPT_URL, $url);
    curl_setopt($ataque, CURLOPT_POST, 1);
    curl_setopt($ataque, CURLOPT_POSTFIELDS, $data);
    $data = curl_exec($ataque);
    curl_close($ataque);

    // $ataque = curl_init($url);
    // $payload = json_encode($data);
    // curl_setopt($ataque, CURLOPT_POSTFIELDS, $payload);
    // curl_setopt($ataque, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    // curl_setopt($ataque, CURLOPT_RETURNTRANSFER, true);
    // $result = curl_exec($ataque);
    // curl_close($ataque);
}
