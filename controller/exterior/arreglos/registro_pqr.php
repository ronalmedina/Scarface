<?php
require_once("../../../models/consultasCliente.php");
require_once("../../../models/conexion.php");
require_once("../../../models/consultas_global.php");
require_once("../../../models/consultasCliente.php");

$consulta = new consultascliente();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fk_sfc_pqrs_productos_id = $_POST['fk_sfc_pqrs_productos_id'];
    $fk_sfc_pqrs_usuario_id = $_POST['fk_sfc_pqrs_usuario_id'];
    $sfc_pqr_descripcion = $_POST['sfc_pqr_descripcion'];
    $sfc_accion = $_POST['sfc_accion'];

    $result = $consulta->insertarPQR($fk_sfc_pqrs_productos_id, $fk_sfc_pqrs_usuario_id, $sfc_pqr_descripcion, $sfc_accion);

    if ($result) {

        echo "<script>alert('Muchas gracias por hacernos llegar el incoveniente');</script>";
        echo '<script>location.href = "../../../Views/client/index.php";</script>';
    } else {
        echo "Error al insertar el PQR";
    }
}
?>
