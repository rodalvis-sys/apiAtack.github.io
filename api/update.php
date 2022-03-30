<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'confing/bd.php';
include_once 'lib/main.php';
include_once 'lib\message.php';

$methodUsed = $_SERVER["REQUEST_METHOD"];

if ($methodUsed != "PUT") {
    return sendResponse("$methodUsed metodo no permitido, use el método PUT.", 405);
}

$database = new Db();
$db = $database->getConnection();

$ataque = new ataque($db);

$data = json_decode(file_get_contents("php://input", true));


$ataque->id = $data->id;
$ataque->Fecha = $data->Fecha;
$ataque->Hora = $data->Hora;
$ataque->Ciudad = $data->Ciudad;
$ataque->Latitud = $data->Latitud;
$ataque->Longitud = $data->Longitud;
$ataque->Tipo = $data->Tipo;
$ataque->Muertos = $data->Muertos;
$ataque->Heridos = $data->Heridos;
$ataque->Total_daños = $data->Total_daños;
$ataque->Autor = $data->Autor;


if ($ataque->update()) {
    sendResponse("Se ha Actualizado", 201);
}

else {
    sendResponse("Ha ocurrido un error", 404);
}