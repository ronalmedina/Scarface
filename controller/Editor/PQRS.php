<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultasEditor.php");
require_once("../../Models/Generar_codigo.php");

function CargarSoporte() {
    $objconsultas = new ConsultaEditor();
    $result = $objconsultas->Soporte();

    if (empty($result)) {
        echo "<tr><td colspan='9'><h2>No hay registros</h2></td></tr>";
    } else {
        foreach ($result as $f) {
            echo '
                <tr>
                    <td>'.$f['sfc_pqr_id'].'</td>
                    <td>'.$f['fk_sfc_pqrs_productos_id'].'</td>
                    <td>'.$f['fk_sfc_pqrs_usuario_id'].'</td>
                    <td>'.$f['sfc_pqr_descripcion'].'</td>
                    <td>
                        <select name="respuesta_'.$f['sfc_pqr_id'].'" class="form-select" aria-label="Respuesta del Editor">
                            <option value="Reembolso" '.($f['sfc_pqr_respuesta'] == "Reembolso" ? "selected" : "").'>Reembolso</option>
                            <option value="Regresado" '.($f['sfc_pqr_respuesta'] == "Regresado" ? "selected" : "").'>Regresado</option>
                        </select>
                    </td>
                    <td>'.$f['fecha_respuesta'].'</td>
                    <td>'.$f['sfc_accion'].'</td>
                    <td>'.$f['sfc_pqr_codigo'].'</td>
                    <td><button class="btn btn-primary" type="submit" name="actualizar_'.$f['sfc_pqr_id'].'">Actualizar</button></td>
                </tr>';
        }
    }
}
?>