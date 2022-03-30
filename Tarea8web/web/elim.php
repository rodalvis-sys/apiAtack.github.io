<?php
require "libs/procesos.php";

function eliminar(){
    $id = $_GET['id'];
    elimAtaques($id);
}
    

template::aplicar();

?>
<h3>ELIMINAR</h3>

<?php
eliminar();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
<script src="libs\back.js"> </script>