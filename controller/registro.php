<?php
require_once("../Models/conexion.php");
require_once("../Models/consultas_global.php");


$nombre = $_POST['nombres'];
$apellido = $_POST['apellidos'];
$correo = $_POST['email'];
$tipodoc = $_POST ['tipoid'];
$documento = $_POST ['documento'];
$clave = $_POST['password'];
$cclave = $_POST['passwordv'];
$estado = 'activo';
$rol = 2;
$foto = "../../Uploads/Users/usuario.png";

if ($clave == $cclave) {
    if(isset($_POST['terminos'])){
        $claveMD= md5($clave);
        $objconsultas = new Consultas();
        $result = $objconsultas->registrarUsuarioExterno($nombre, $apellido, $correo, $tipodoc, $documento, $claveMD, $estado, $rol, $foto);

    }else{
        echo '<script>alert("Por favor acepte los terminos y condiciones")</script>';
        echo "<script>location.href='../Views/extras/registro.html'</script>";
    }
}
else{
    echo '<script>alert("Las claves ingresadas no coinciden")</script>';
    echo "<script>location.href='../Views/extras/registro.html'</script>";
}
?>