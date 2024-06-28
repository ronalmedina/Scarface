<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultasAdmin.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $objConsultas = new ConsultasAdmin();
    $objConsultas->eliminarProducto($id);

} else {
    echo "No se proporcionó un ID para eliminar el usuario.";
}
?>