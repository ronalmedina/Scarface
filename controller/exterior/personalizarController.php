<?php
require_once("../../models/consultasCliente.php");
require_once("../../models/conexion.php");
    $producto=$_POST['producto'];
    $foto_1="../../Uploads/Personalizar/".$_FILES['foto1']['name'];
    $resgistrarf  = move_uploaded_file($_FILES['foto1']['tmp_name'],$foto_1);
    $foto_2="../../Uploads/Personalizar/".$_FILES['foto2']['name'];
    $resgistrarf  = move_uploaded_file($_FILES['foto2']['tmp_name'],$foto_2);
    $texto = $_POST['texto'];
    $objconsultas = new consultascliente();
    $result = $objconsultas->registrarPerso($producto,$foto_1,$foto_2,$texto);
    if ($result) {
        echo'<script>alert("Exitoso")</script>';
        echo'<script>location.href="../../Views/client/catalogo_personalizable.php"</script>';
    }


?>
