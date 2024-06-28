<?php

function mostrarFormularioPQR($pqr) {
    if ($pqr) {
        echo '
                <a style="position: relative;top: 20vh;display: flex;justify-content: center;font-size: 4vh;left: 25vh;color: #0c4125;text-decoration: none !important;width: 8%;"  href="../../views/client/consultar_pqr.php"><i class="bi bi-arrow-left"></i></a>
            <div class="container mt-5" style="position: relative;top: 15vh;">
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="pqr_id" class="form-label">ID PQR</label>
                            <input style="box-shadow: 4px 4px 4px #0c4125;border: 2px solid #0c4125 !important;" type="text" name="pqr_id" class="form-control" id="pqr_id" value="'.$pqr['sfc_pqr_id'].'" readonly>
                        </div>

                        <div style="position: relative;bottom: 17px;" class="col-lg-6 mt-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input style="box-shadow: 4px 4px 4px #0c4125;border: 2px solid #0c4125 !important;" type="text" name="descripcion" class="form-control" id="descripcion" value="'.$pqr['sfc_pqr_descripcion'].'" readonly>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label for="respuesta" class="form-label">Respuesta</label>
                            <input style="box-shadow: 4px 4px 4px #0c4125;border: 2px solid #0c4125 !important;" type="text" name="respuesta" class="form-control" id="respuesta" value="'.$pqr['sfc_pqr_respuesta'].'" readonly>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label for="fecha_respuesta" class="form-label">Fecha Respuesta</label>
                            <input style="box-shadow: 4px 4px 4px #0c4125;border: 2px solid #0c4125 !important;" type="text" name="fecha_respuesta" class="form-control" id="fecha_respuesta" value="'.$pqr['fecha_respuesta'].'" readonly>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label for="accion" class="form-label">Acción</label>
                            <input style="box-shadow: 4px 4px 4px #0c4125;border: 2px solid #0c4125 !important;" type="text" name="accion" class="form-control" id="accion" value="'.$pqr['sfc_accion'].'" readonly>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label for="usuario_email" class="form-label">Email del Usuario</label>
                            <input style="box-shadow: 4px 4px 4px #0c4125;border: 2px solid #0c4125 !important;" type="text" name="usuario_email" class="form-control" id="usuario_email" value="'.$pqr['sfc_usuario_email'].'" readonly>
                        </div>
                    </div>
                </form>
            </div>
        ';
    } else {
        echo '
            <div class="container mt-5">
                <div class="alert alert-danger" role="alert">
                    No se encontró una PQR con el código proporcionado.
                </div>
            </div>
        ';
    }
}
?>