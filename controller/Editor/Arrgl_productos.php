<?php
require_once("../../models/consultasEditor.php");
require_once("../../models/consultas_global.php");

function CargarProductosPersonalizables(){
    $objconsultas = new ConsultaEditor();
    $result = $objconsultas->cargarProductos();
    if(empty($result)){
        echo "<h2>No hay registros</h2>";
    } else {
       
        foreach($result as $f){
            $personalizable=($f['sfc_producto_personalizable'] == 1) ? "Personalizable": "No Personalizable";
            $existencias = ($f['sfc_producto_estado'] == "activo") ? "" : 'style= "background-color:#ff00004a;"';
            echo '            
                <tr '.$existencias.'>
                    <td><img style="width: 100px;height: auto;" src="'.$f['sfc_producto_foto_1'].'" alt="Fotografia del producto"></td>
                    <td>'.$f['sfc_producto_nombre'].'</td>
                    <td>'.$f['sfc_producto_stock'].'</td>
                    <td>'.$personalizable.'</td>
                </tr>
            ';
        }
    }

}
?>
