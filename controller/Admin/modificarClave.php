<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultasAdmin.php");

    $id=$_POST['id'];
    $passold=md5($_POST['passold']);
    $passnew=$_POST['passnew'];
    $passMD = md5($passnew);

    if ($passnew == $passnew) {
        if(isset($_POST['terminos'])){
            $passMD= md5($passnew);
            $objconsultas = new ConsultasAdmin();
            $result = $objconsultas->cambiarpass($id,$passold,$passMD);
    
        }else{
            echo '<script>alert("Por favor acepte los terminos y condiciones")</script>';
            echo "<script>location.href='../../views/Admin/editar_perfil.php'</script>";
        }
    }
    else{
        echo '<script>alert("Las claves ingresadas no coinciden")</script>';
        echo "<script>location.href='../../views/Admin/editar_perfil.php'</script>";
    }
?>
