<?php
    require_once("../../Models/conexion.php");
    require_once("../../Models/consultasAdmin.php");

    if(isset($_POST['id']) && isset($_FILES['sfc_usuario_foto'])){
        $id= $_POST['id'];
        $foto="../../Uploads/Users/".$_FILES['sfc_usuario_foto']['name'];
        $mover = move_uploaded_file($_FILES['sfc_usuario_foto']['tmp_name'],$foto);
        $objconsultas= new ConsultasAdmin();
        $result = $objconsultas->modificarFoto($id,$foto);
    } else{
        echo "Error";
    }

   
?>