<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultasAdmin.php");
require_once("../../controller/Admin/Arrgl_Usuarios.php");


    $id= $_POST['id'];
    $nombre = $_POST['sfc_usuario_nombre'];
    $apellidos = $_POST['sfc_usuario_apellido'];
    $email = $_POST['sfc_usuario_email'];
    $telefono = $_POST['sfc_usuario_telefono'];

    // Crear una instancia de la clase ConsultasAdmin
    $consultasAdmin = new ConsultasAdmin();

    // Llamar al método modificarUsers para editar el usuario
    $consultasAdmin->EditarProfile($id, $nombre, $apellidos, $email, $telefono);


?>