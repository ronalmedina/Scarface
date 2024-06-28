<?php
require_once("../../models/consultasAdmin.php");

function PedidosUsuario() {
    $objConsultas = new consultasCliente();
    $result = $objConsultas->ver_pedidos(); 

    if (empty($result)) {
        echo "<h2 style='position: relative;top: 15vh;display: grid;justify-content: center;'>No tienes pedidos</h2>";
    } else {
        // Iterar sobre cada pedido y mostrar la información relevante
        foreach ($result as $pedido) {
            echo '
                <tr>
                    <th style="position: relative;text-align: center;" scope="row">'.$pedido['sfc_pedido_id'].'</th>
                    <td style="position: relative;text-align: center;">'.$pedido['sfc_pedido_fecha'].'</td>
                    <td style="position: relative;text-align: center;">'.$pedido['sfc_pedido_estado'].'</td>
                    <td>
                        <form action="../../Factura/invoice.php" method="GET">
                            <input type="hidden" name="sfc_pedido_id" value="'.$pedido['sfc_pedido_id'].'">
                            <button style="background: #0c4125;border: none;border-color: transparent;position: relative;left: 8vh;border-radius: 15px;" type="submit" class="btn btn-primary">Factura</button>
                        </form>
                    </td>
                    <td><a style="background: #0c4125;border: none;border-color: transparent;position: relative;left: 8vh;border-radius: 15px;" class="btn btn-primary" href="../../controller/exterior/arreglos/eliminar_pedido.php?sfc_pedido_id='.$pedido['sfc_pedido_id'].'">Eliminar</a></td>
                </tr>
            ';
        }
    }
}
?>
