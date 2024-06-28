<?php
require_once("../../models/conexion.php");
require_once("../../models/consultasAdmin.php");
require_once("../../models/consultas_global.php");
require_once("../../models/consultasEditor.php");

function CargarPedidos() {
    $objconsultas = new ConsultaEditor();
    $result = $objconsultas->Pedidos();

    if (empty($result)) {
        echo "<h2>No hay registros</h2>";
    } else {
        echo '<form action="../../controller/Editor/Actualizar_pedidos.php" method="POST">';
        echo '<table class="table">'; // Inicia la tabla
        echo '
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>ID Usuario</th>
                    <th>Fecha del Pedido</th>
                    <th>Estado del Pedido</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>';
        
        foreach ($result as $f) {
            echo '
            <tr>
                <td>'.$f['sfc_pedido_id'].'</td>
                <td>'.$f['fk_sfc_pedidos_usuario_id'].'</td>
                <td>'.$f['sfc_pedido_fecha'].'</td>
                <td>
                    <select class="form-select" aria-label="Estado del pedido" name="sfc_pedido_estado_'.$f['sfc_pedido_id'].'">
                        <option value="'.$f['sfc_pedido_estado'].'" selected>'.$f['sfc_pedido_estado'].'</option>
                        <option value="Entregado">Entregado</option>
                    </select>
                </td>
                <td>
                    <input type="hidden" name="sfc_pedido_id[]" value="'.$f['sfc_pedido_id'].'">
                    <button type="submit" name="actualizar_pedido_'.$f['sfc_pedido_id'].'" class="btn btn-primary">Actualizar Pedido</button>
                </td>
            </tr>';
        }

        echo '</tbody></table>'; // Cierra la tabla
        echo '</form>'; // Cierra el formulario
    }
}


?>
