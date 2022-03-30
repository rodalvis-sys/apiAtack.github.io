<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'confing/bd.php';
include_once 'lib/main.php';
include_once 'lib\message.php';
include_once 'lib\getLocation.php';

$methodUsed = $_SERVER["REQUEST_METHOD"];

if ($methodUsed != "POST") {
    return sendResponse("No se permite el metodo $methodUsed, use POST method.", 405);
}


$data = json_decode(file_get_contents("php://input"));


$database = new Db();
$db = $database->getConnection();
$ataque = new ataque($db);

// $address = getLocation($lat, $long);


// if($address->countryName != "Ukraine") {
//     return sendResponse("TLa localización no es validad", 404); }

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





if ($ataque->create()) {
    sendResponse("Se ha creado el ataque", 201);
}

else {
    sendResponse("Ha ocurrido un error", 404);
}