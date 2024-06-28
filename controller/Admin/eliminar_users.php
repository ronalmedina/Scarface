<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultasAdmin.php");

if(isset($_GET['id'])) {
    $identificacion = $_GET['id'];

    $objConsultas = new ConsultasAdmin();
    $objConsultas->eliminarUsers($identificacion);

} else {
    echo "No se proporcionó un ID para eliminar el usuario.";
}
?>