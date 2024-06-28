<?php
require_once("../../models/conexion.php");
require_once("../../models/consultasEditor.php");
require_once("../../models/Generar_codigo.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $objConsultas = new ConsultaEditor();
    $generadorCodigo = new GenerarCodigo();
    
    foreach ($_POST as $key => $value) {
        // Verificar si se está enviando una respuesta para actualizar
        if (strpos($key, 'actualizar_') !== false) {
            $pqr_id = substr($key, strlen('actualizar_'));

            // Obtener la respuesta seleccionada del formulario
            $respuesta = $_POST['respuesta_'.$pqr_id];

            try {
                // Actualizar la respuesta, la fecha y el código único
                $codigo_generado = $objConsultas->ActualizarRespuestaYCodigo($pqr_id, $respuesta);

                // Obtener el correo del usuario asociado a esta solicitud
                $correo_usuario = $objConsultas->ObtenerCorreoUsuario($pqr_id);

                // Enviar correo electrónico con el código único generado
                $generadorCodigo->enviarCodigoUnico($correo_usuario, $codigo_generado);

                // Mostrar mensaje de actualización exitosa y redirigir
                echo '<script>alert("Registro actualizado correctamente. Se ha enviado un correo con un código único.");</script>';
                echo '<script>location.href = "../../views/Editor/pqrs.php";</script>';
                exit; // Terminar la ejecución después de redirigir
            } catch (Exception $e) {
                echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
            }

            break; // Salir del bucle, ya que solo se actualiza un registro a la vez
        }
    }
}
?>
