<?php
require "libs/procesos.php";  

if ($_POST) {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $ciudad = $_POST['ciudad'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $tipo = $_POST['tipo'];
    $muertos = $_POST['muertos'];
    $heridos = $_POST['heridos'];
    $daños = $_POST['daños'];
    $autor = $_POST['autor'];
        $result = NuevoAtaques($fecha, $hora, $ciudad, $lat, $long, $tipo, $muertos, $heridos, $daños, $autor);
}

template::aplicar();

?>


<h3>NUEVO</h3>
<a href='index.php' class='btn btn-primary'>ATRAS</a>
<form method="post" action="<?= $_SERVER['REQUEST_URI'];?>">
<table>
    <thead>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Ciudad</th>
        <th>Latitud</th>
        <th>Longitud</th>

    </thead>
    <tbody>
        <tr>
            <td>
                <input name="fecha" type="text" placeholder="FECHA">
            </td>
            <td>
                <input name="hora" type="text" placeholder="HORA">
            </td>
            <td>
                <input name="ciudad" type="text" placeholder="CIUDAD">
            </td>
            <td>
                <input name="lat" type="text" placeholder="LATITUD">
            </td>
            <td>
                <input name="long" type="text" placeholder="LONGITUD">
            </td>

        </tr>

    </tbody>
    <thead>
        <th>Tipo</th>
        <th>Muertos</th>
        <th>Heridos</th>
        <th>Daños Total</th>
        <th>Autor</th>
        <th><button type='submit' class='btn btn-primary'>ACEPTAR</button></th>
    </thead>
    <tbody>
        <tr>
            <td>
                <input name="tipo" type="text" placeholder="TIPO">
            </td>
            <td>
                <input name="muertos" type="text" placeholder="MUERTOS">
            </td>
            <td>
                <input name="heridos" type="text" placeholder="HERIDOS">
            </td>
            <td>
                <input name="daños" type="text" placeholder="DAÑOS">
            </td>
            <td>
                <input name="autor" type="text" placeholder="AUTOR">
            </td>
        </tr>
    </tbody>
</table>

