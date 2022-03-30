<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'confing/bd.php';
include_once 'lib/main.php';
include_once 'lib/message.php';

$methodUsed = $_SERVER["REQUEST_METHOD"];

if ($methodUsed != "GET") {
    return sendResponse("No se permite el metodo $methodUsed, use el metodo GET.", 405);
}

$database = new Db();
$db = $database->getConnection();


$ataque = new ataque($db);

$stmt = $ataque->read();
$num = $stmt->rowCount();

if ($num > 0) {
    
    $ataque_arr = array();
    $ataque_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);
        $ataque_item = array(
            "id" => $row['id'],
            "Fecha" => $row['fecha'],
            "Hora" => $row['hora'],
            "Ciudad" => $row['ciudad'],
            "Latitud" => $row['latitud'],
            "Longitud" => $row['longitud'],
            "Tipo" => $row['tipo'],
            "Muertos" => $row['muertos'],
            "Heridos" => $row['heridos'],
            "Total_daños" => $row['totalDaños'],
            "Autor" => $row['autor']
        );
        array_push($ataque_arr["records"], $ataque_item);
    }
    echo json_encode($ataque_arr);
} else {
    sendResponse("Ha ocurrido un error", 404);
}