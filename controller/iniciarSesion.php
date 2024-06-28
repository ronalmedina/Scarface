<?php
require_once("../Models/conexion.php");
require_once("../Models/consultas_global.php");


if (!isset($_POST["submit"])) {
    $pass= md5($_POST['clave']);
    $email=$_POST['email'];
    $objconsultas =new Consultas();
    $result = $objconsultas->validarSesion($email,$pass);
}


?>