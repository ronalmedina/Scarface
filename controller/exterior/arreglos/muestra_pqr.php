<?php
require_once("../../models/consultasCliente.php");
require_once("../../models/conexion.php");
require_once("../../models/consultas_global.php");
require_once("../../models/consultasCliente.php");

$consulta = new consultascliente();
$pqr = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_unico = $_POST['codigo_unico'];
    $pqr = $consulta->obtenerPqrPorCodigo($codigo_unico);

    if (!$pqr) {
        $error = "No se encontró una PQR con el código proporcionado.";
    }
}
?>
