<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultasAdmin.php");

    $rol = $_POST['rol'];
    $id = $_POST['id'];
    $estado = $_POST['estado'];

    // Crear una instancia de la clase ConsultasAdmin
    $consultasAdmin = new ConsultasAdmin();
    // Llamar al método modificarUsers para editar el usuario
    $consultasAdmin->modificarUsers($id,$rol,$estado);
?>