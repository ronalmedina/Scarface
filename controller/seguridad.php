<?php
if(!isset($_SESSION["Autenticado"]) || $_SESSION["Autenticado"] !== "SI") {
    echo '<script>alert("No ha iniciado Sesión");</script>';
    echo '<script>location.href = "../extras/login.html";</script>';
}else{
    if ($_SESSION['rol']==2){
        echo '<script>alert("No tiene acceso");</script>';
    }
}
?>
