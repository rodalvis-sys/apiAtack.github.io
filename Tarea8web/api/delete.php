
<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once 'confing/bd.php';
include_once 'lib/main.php';
include_once 'lib\message.php';

$methodUsed = $_SERVER["REQUEST_METHOD"];

if ($methodUsed != "DELETE") {
    return sendResponse("No se permite el metodo $methodUsed, use el método DELETE.", 405);
}

$database = new Db();
$db = $database->getConnection();

$ataque = new ataque($db);
$data = json_decode(file_get_contents("php://input"));
$ataque->id = $data->id;



if ($ataque->delete()) {
    sendResponse("Ataque eliminado", 201);
}

else {
    sendResponse("Ha ocurrido un error", 404);
}