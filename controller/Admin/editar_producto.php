<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultasAdmin.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id= $_POST['id'];
    $nombre=$_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $personalizable = $_POST['personalizable'];
    if($cantidad>=1){
        $estado = "activo";
    }else{
        $estado = "inactivo";
    }
    $consultasAdmin = new ConsultasAdmin();
    $consultasAdmin->modificarProducto($id,$nombre,$precio,$descripcion,$cantidad,$personalizable,$estado);
}
?>