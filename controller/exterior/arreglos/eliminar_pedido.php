<?php
require_once("../../../models/conexion.php");
require_once("../../../models/consultasAdmin.php");
require_once("../../../models/consultas_global.php");
require_once("../../../models/consultasCliente.php");

if(isset($_GET['sfc_pedido_id'])) {
    $id = $_GET['sfc_pedido_id'];

    $objConsultas = new ConsultasCliente();
    $objConsultas->Eliminarpedido($id);

} else {
    echo "No se proporcionó un ID para eliminar el usuario.";
}
?>