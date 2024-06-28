
<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultasAdmin.php");

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$cantidad= $_POST['cantidad'];
$categoria  =$_POST['categoria'];
$personalizable= $_POST['personalizable'];
$color = $_POST['color'];
$genero= $_POST['genero'];
$foto_0="../../Uploads/Productos/".$_FILES['foto']['name'];
$resgistrarf  = move_uploaded_file($_FILES['foto']['tmp_name'],$foto_0);
  
    $objconsultas = new ConsultasAdmin();

    $result = $objconsultas->registrarProductos($nombre,$descripcion,$foto_0,$cantidad,$categoria, $personalizable, $color, $genero);


?>