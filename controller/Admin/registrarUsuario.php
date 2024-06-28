<?php
require_once("../../models/conexion.php");
require_once("../../models/consultasAdmin.php");

$usu_nombre = $_POST['usu_nombre'];
$usu_apellido = $_POST['usu_apellido'];
$usu_tipo_documento = $_POST['usu_tipo_documento'];
$usu_documento = $_POST['usu_documento'];
$usu_correo = $_POST['usu_correo'];
$estado = $_POST['estado'];
$usu_direccion = $_POST['usu_direccion'];
$usu_rol = $_POST['usu_rol'];
$usu_fecha = date('y-m-d');
$usu_telefono = $_POST['usu_telefono'];
$usu_foto = "../../Uploads/Users/" . $_FILES['foto']['name'];
$mover = move_uploaded_file($_FILES['foto']['tmp_name'], $usu_foto);

$usu_contrasenia= $usu_documento; 

$claveMD = md5($usu_contrasenia); 

$objconsultas = new ConsultasAdmin();

$result = $objconsultas->registrarUsuario($usu_nombre, $usu_apellido, $usu_tipo_documento, $usu_documento,$usu_correo, $estado, $usu_direccion, $usu_rol, $usu_fecha, $usu_telefono, $usu_foto, $claveMD); 


?>