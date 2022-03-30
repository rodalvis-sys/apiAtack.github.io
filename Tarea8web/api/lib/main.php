<?php

include_once 'lib\getLocation.php';
include_once 'lib\message.php';
class ataque
{
private $conn; 
private $table_name = "ataque"; 
public $id;
public $Fecha;
public $Hora;
public $Ciudad;
public $Latitud;
public $Longitud;
public $Tipo;
public $Muertos;
public $Heridos;
public $Total_daños;
public $Autor;

public function __construct($db){
    $this->conn = $db;
}

public function read() {
    $query = "SELECT * FROM " . $this->table_name . "";
    
    $stmt = $this->conn->prepare($query);
    
    $stmt->execute();
    return $stmt;
}

function create() {
    $query = "INSERT INTO
            " . $this->table_name . "(fecha, hora, ciudad, latitud, longitud, tipo, muertos, heridos, totalDaños, autor)
            VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->Fecha);
    $stmt->bindParam(2, $this->Hora);
    $stmt->bindParam(3, $this->Ciudad);
    $stmt->bindParam(4, $this->Latitud);
    $stmt->bindParam(5, $this->Longitud);
    $stmt->bindParam(6, $this->Tipo);
    $stmt->bindParam(7, $this->Muertos);
    $stmt->bindParam(8, $this->Heridos);
    $stmt->bindParam(9, $this->Total_daños);
    $stmt->bindParam(10, $this->Autor);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function update() {
    $query = "UPDATE " . $this->table_name . " 
    SET fecha = ?, hora = ?, ciudad = ?, latitud = ?, longitud = ?, tipo = ?, muertos = ?, heridos = ?, totalDaños = ?, autor = ? WHERE id = ?";

    $stmt = $this->conn->prepare($query);


    $stmt->bindParam(1, $this->Fecha);
    $stmt->bindParam(2, $this->Hora);
    $stmt->bindParam(3, $this->Ciudad);
    $stmt->bindParam(4, $this->Latitud);
    $stmt->bindParam(5, $this->Longitud);
    $stmt->bindParam(6, $this->Tipo);
    $stmt->bindParam(7, $this->Muertos);
    $stmt->bindParam(8, $this->Heridos);
    $stmt->bindParam(9, $this->Total_daños);
    $stmt->bindParam(10, $this->Autor);
    $stmt->bindParam(11, $this->id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function delete() {
    
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

    $stmt = $this->conn->prepare($query);

    $this->id = htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(1, $this->id);

    if ($stmt->execute()) {
        return true;
    }

    return false;
}

}