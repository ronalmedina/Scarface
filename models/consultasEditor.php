<?php
class ConsultaEditor {
    public function ObtenerPedidoPorId($pedido_id) {
        $objConexion = new Conexion();
        $conexion = $objConexion->getconexion();
        
        $BuscarPedido = "SELECT * FROM sfc_pedidos WHERE sfc_pedido_id = :pedido_id";
        $result = $conexion->prepare($BuscarPedido);
        $result->bindParam(':pedido_id', $pedido_id, PDO::PARAM_INT);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function ObtenerUsuarioPorId($usuario_id) {
        $objConexion = new Conexion();
        $conexion = $objConexion->getconexion();
        
        $BuscarUsuario = "SELECT * FROM sfc_usuarios WHERE sfc_usuario_id = :usuario_id";
        $result = $conexion->prepare($BuscarUsuario);
        $result->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function ActualizarPedido($pedido_ids, $pedido_estados) {
        $objConexion = new Conexion();
        $conexion = $objConexion->getconexion();
        
        $conexion->beginTransaction();
        
        try {
            $ActualizarPedido = "UPDATE sfc_pedidos SET sfc_pedido_estado = :pedido_estado WHERE sfc_pedido_id = :pedido_id";
            $actualizar = $conexion->prepare($ActualizarPedido);
            
            foreach ($pedido_ids as $index => $pedido_id) {
                $pedido_estado = $pedido_estados[$index]; 
                
                $actualizar->bindParam(':pedido_estado', $pedido_estado);
                $actualizar->bindParam(':pedido_id', $pedido_id);
                $actualizar->execute();
            }
            
            $conexion->commit();
        } catch (PDOException $e) {
            $conexion->rollBack();
            throw new Exception("Error al actualizar los pedidos: " . $e->getMessage());
        }
    }
    
    public function Pedidos() {
        $objConexion = new Conexion();
        $conexion = $objConexion->getconexion();
        $f = null;
    
        $Buscarpedidos = "SELECT sfc_pedido_id, fk_sfc_pedidos_usuario_id, sfc_pedido_fecha, sfc_pedido_estado FROM sfc_pedidos";
        $result = $conexion->prepare($Buscarpedidos);
        $result->execute();
    
        while ($resultado = $result->fetch(PDO::FETCH_ASSOC)) {
            $f[] = $resultado;
        }
    
        return $f;
    }

    public function Soporte() {
        $objConexion = new Conexion();
        $conexion = $objConexion->getconexion();
        $f = null;
    
        $consulta = "SELECT sfc_pqr_id, fk_sfc_pqrs_productos_id, fk_sfc_pqrs_usuario_id, sfc_pqr_descripcion, sfc_pqr_respuesta, fecha_respuesta, sfc_accion, sfc_pqr_codigo FROM sfc_pqrs";
        $result = $conexion->prepare($consulta);
        $result->execute();
    
        // Verificar si se encontraron registros
        if ($result->rowCount() > 0) {
            // Procesar los resultados
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
        } else {
            $f = null;
        }
    
        return $f;
    }
    

    public function ActualizarRespuestaYCodigo($pqr_id, $respuesta) {
        $objConexion = new Conexion();
        $conexion = $objConexion->getconexion();
    
        try {
            // Iniciar transacción
            $conexion->beginTransaction();
    
            // Obtener la fecha actual
            $fecha_respuesta = date("Y-m-d H:i:s");
    
            // Generar código único
            $codigo_unico = self::generarCodigoUnico($pqr_id);
    
            // Actualizar la respuesta, la fecha y el código único en la tabla sfc_pqrs
            $query = "UPDATE sfc_pqrs SET sfc_pqr_respuesta = :respuesta, fecha_respuesta = :fecha_respuesta, sfc_pqr_codigo = :codigo_unico WHERE sfc_pqr_id = :pqr_id";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':respuesta', $respuesta);
            $stmt->bindParam(':fecha_respuesta', $fecha_respuesta);
            $stmt->bindParam(':codigo_unico', $codigo_unico);
            $stmt->bindParam(':pqr_id', $pqr_id);
            $stmt->execute();
    
            // Confirmar transacción
            $conexion->commit();
    
            // Retornar el código generado
            return $codigo_unico;
        } catch (PDOException $e) {
            // Revertir cambios en caso de error
            $conexion->rollback();
            throw new Exception("Error al actualizar la respuesta: " . $e->getMessage());
        }
    }
    


    public static function generarCodigoUnico($id) {
        return uniqid($id . '_');
    }
    

    public function ObtenerCorreoUsuario($pqr_id) {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->getconexion();
    
            $query = "SELECT u.sfc_usuario_email
                      FROM sfc_pqrs p
                      INNER JOIN sfc_usuarios u ON p.fk_sfc_pqrs_usuario_id = u.sfc_usuario_id
                      WHERE p.sfc_pqr_id = :pqr_id";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':pqr_id', $pqr_id, PDO::PARAM_INT);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado['sfc_usuario_email'];
            } else {
                return null; // PQR no encontrada o usuario no asociado
            }
    
        } catch (PDOException $e) {
            throw new Exception("Error al obtener el correo del usuario: " . $e->getMessage());
        }
    }
    public function cargarProductos(){
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        $f=null;
        $mostrarProductos = "SELECT p.*, c.sfc_nombre_categoria FROM sfc_productos p INNER JOIN sfc_categorias c ON p.sfc_producto_categoria_id=c.sfc_categoria_id";
        $result = $conexion->prepare($mostrarProductos);
        $result->execute();
        // siempre que se haga una consulta se debe usar el fetch para convertir result en un arreglo y de está forma segmentar todo
        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    }
    
    
   
}
?>
 