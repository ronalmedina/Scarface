<?php
require_once("../Models/conexion.php");
require_once("../Models/generarClaveEmail.php");

$id = $_POST ["ndocumento"];
$email = $_POST ["email"];

 $objclave = new GenerarClave();
 $result = $objclave->enviarNuevaClave($id,$email);

?>
