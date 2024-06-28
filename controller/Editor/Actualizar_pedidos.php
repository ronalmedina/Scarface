<?php
require_once("../../models/conexion.php");
require_once("../../models/consultasEditor.php");
require_once("../../models/Generar_notificacion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $objConsultas = new ConsultaEditor();
    $objGenerarClave = new GenerarClave();

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'actualizar_pedido_') !== false) {
            $pedido_id = substr($key, strlen('actualizar_pedido_'));
            $pedido_estado = $_POST['sfc_pedido_estado_' . $pedido_id];

            try {
                // Actualizar el pedido con el nuevo estado
                $objConsultas->ActualizarPedido($pedido_id, $pedido_estado);

                // Obtener información del pedido para obtener el usuario asociado
                $pedido = $objConsultas->ObtenerPedidoPorId($pedido_id);

                if ($pedido) {
                    $usuario_id = $pedido['fk_sfc_pedidos_usuario_id'];
                    $usuario = $objConsultas->ObtenerUsuarioPorId($usuario_id);

                    if ($usuario) {
                        $email = $usuario['sfc_usuario_email'];
                        $nombre = $usuario['sfc_usuario_nombre'];

                        // Envío de correo electrónico notificando al usuario
                        $objGenerarClave->enviarNotificacionPedido($email, $nombre, $pedido_estado);
                    }
                }

                echo "<script>alert('Pedido actualizado correctamente');</script>";
                echo '<script>location.href = "../../Views/Editor/pedidos.php";</script>';
            } catch (PDOException $e) {
                echo "Error al actualizar el pedido: " . $e->getMessage();
                exit;
            }
        }
    }
}
?>
