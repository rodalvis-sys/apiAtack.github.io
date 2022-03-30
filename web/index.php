<?php


// require __DIR__ . '/libs/procesos.php';
require "libs/procesos.php";

function Mostrar()
{
    $result = getAtaques();
    $result = $result->records;
    // print_r($result);
    foreach ($result as $ataque) {
        echo <<<FILAS
        <tr>
        <td>{$ataque->id}</td>
        <td>{$ataque->Fecha}</td>
        <td>{$ataque->Hora}</td>
        <td>{$ataque->Ciudad}</td>
        <td>{$ataque->Latitud}</td>
        <td>{$ataque->Longitud}</td>
        <td>{$ataque->Tipo}</td>
        <td>{$ataque->Muertos}</td>
        <td>{$ataque->Heridos}</td>
        <td>{$ataque->Total_daños}</td>
        <td>{$ataque->Autor}</td>
        <td>
        <a href='edit.php?id={$ataque->id}' class='btn btn-primary'>EDITAR</a>
        <a onclick="return confirm('Seguro que deseas Eliminar esta fila?');" href='elim.php?id={$ataque->id}' class='btn btn-primary'>ELIMINAR</a>
        </td>
        </tr>
        FILAS;
    }
}

template::aplicar();

?>

<div class="text-end">
<a href='nuevo.php' class='btn btn-primary'>NUEVO</a>

</div>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Ciudad</th>
            <th>Latitud</th>
            <th>Longitud</th>
            <th>Tipo</th>
            <th>Muertos</th>
            <th>Heridos</th>
            <th>Daños Total</th>
            <th>Autor</th>
            <th>_</th>
        </tr>

    </thead>
    <tbody>
        <pre>
                <?php Mostrar(); ?>
                </pre>

    </tbody>
</table>