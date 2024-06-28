<?php
require_once("../Models/conexion.php");
require_once("../Models/consultas_global.php");

    $objconsultas = new consultas();
    $result = $objconsultas->cerrarSesion();
    
?>