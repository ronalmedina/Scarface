<?php
require_once("../../models/conexion.php");
require_once("../../models/consultasAdmin.php");
require_once("../../models/consultas_global.php");

function CargarUsers(){
    $objconsultas = new ConsultasAdmin();
    $result = $objconsultas->consultarUsuarios();

    if(empty($result)){
        echo "<h2>No hay registros</h2>";
    } else {
        // aquí pintamos la información consultada en el modelo para enviarse a la vista
        foreach($result as $f){
            if($f['sfc_usuario_estado']=="activo"){
                $color = "";
            }else{
                $color = "background:#ff000036;";
            }
            echo '
                <tr style="'.$color.'">
                    <th><img src="'.$f['sfc_usuario_foto'].' " alt="Profile photo" width="80px" height="80px"></th>
                    <th>'.$f['sfc_usuario_nombre'].' '.$f['sfc_usuario_apellido'].'</th>
                    <td>'.$f['sfc_usuario_email'].'</td>
                    <td>'.$f['sfc_usuario_telefono'].'</td>
                    <td>'.$f['sfc_rol_nombre'].'</td>
                    <td style="text-align: center;"><a href ="../../views/Admin/editarUsuario.php?Id='.$f['sfc_usuario_id'].'" class="btn btn-primary ti-pencil-alt"> Editar Rol</a></td>
                    <td style="text-align: center;"><a href="../../controller/Admin/eliminar_Usuarios.php?Id='.$f['sfc_usuario_id'].'" class="btn btn-danger ti-rocket"> Eliminar</a></td>
                </tr>
            ';
        }
    }

}
?>