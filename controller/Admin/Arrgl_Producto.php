<?php
require_once("../../models/consultasAdmin.php");
require_once("../../models/consultas_global.php");

function CargarProductos(){
    $objconsultas = new ConsultasAdmin();
    $result = $objconsultas->cargarProductos();
    if(empty($result)){
        echo "<h2>No hay registros</h2>";
    } else {
       
        foreach($result as $f){
            $personalizable=($f['sfc_producto_personalizable'] == 1) ? "Personalizable": "No Personalizable";
            $existencias = ($f['sfc_producto_estado'] == "activo") ? "" : 'style= "background-color:#ff00004a;"';
            echo '            
                <tr '.$existencias.'>
                    <td>'.$f['sfc_producto_nombre'].'</td>
                    <td>'.$f['sfc_producto_descripcion'].'</td>
                    <td><img src="'.$f['sfc_producto_foto_1'].'" alt="" class="w-px-100 h-auto "></td>
                    <td>'.$f['sfc_producto_stock'].'</td>
                    <td>'.$personalizable.'</td>
                    <td style="text-align: center;"><a href ="../../views/Admin/editarProducto.php?id='.$f['sfc_producto_id'].'" class="btn btn-primary"> Editar</a></td>
                    <td style="text-align: center;"><a href="../../controllers/Admin/eliminarProducto.php?id='.$f['sfc_producto_id'].'" class="btn btn-danger"> Eliminar</a></td>
                </tr>
            ';
        }
    }

}
?>
