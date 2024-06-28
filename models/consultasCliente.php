<?php
class consultascliente {
    public function mostrarUser($id) {
        $f = null;
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        if ($conexion) {
            try {
                $consultarUser = "SELECT * FROM sfc_usuarios WHERE sfc_usuario_id = :id";
                $result = $conexion->prepare($consultarUser);
                $result->bindparam(':id', $id);
                $result->execute();
                while ($resultado = $result->fetch()) {
                    $f[] = $resultado;
                }
                return $f;
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        } else {
            echo "Error al conectar con la base de datos.";
        }
    }

    public function CatalogoPorCategoriaID($categoriaID) {
        $f = null;
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        if ($conexion) {
            try {
                $consultarProductos = "SELECT * FROM sfc_productos WHERE sfc_producto_Categoria_id = :categoriaID";
                $result = $conexion->prepare($consultarProductos);
                $result->bindparam(':categoriaID', $categoriaID);
                $result->execute();
                while ($resultado = $result->fetch(PDO::FETCH_ASSOC)) {
                    $f[] = $resultado;
                }
                return $f;
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        } else {
            echo "Error al conectar con la base de datos.";
        }
    }
    
    public function CatalogoPersonalizables($personalizable) {
        $f = null;
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        if ($conexion) {
            try {
                $consultarProductos = "SELECT * FROM sfc_productos WHERE sfc_producto_personalizable = :personalizable";
                $result = $conexion->prepare($consultarProductos);
                $result->bindparam(':personalizable', $personalizable);
                $result->execute();
                while ($resultado = $result->fetch(PDO::FETCH_ASSOC)) {
                    $f[] = $resultado;
                }
                return $f;
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        } else {
            echo "Error al conectar con la base de datos.";
        }
    }

    public function CatalogoPorGenero($genero) {
        $f = null;
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        if ($conexion) {
            try {
                $consultarProductos = "SELECT * FROM sfc_productos WHERE sfc_producto_genero = :genero";
                $result = $conexion->prepare($consultarProductos);
                $result->bindparam(':genero', $genero);
                $result->execute();
                while ($resultado = $result->fetch(PDO::FETCH_ASSOC)) {
                    $f[] = $resultado;
                }
                return $f;
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        } else {
            echo "Error al conectar con la base de datos.";
        }
    }

    public function Catalogo() {
        $f = null;
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        if ($conexion) {
            try {
                $consultarProductos = "SELECT * FROM sfc_productos";
                $result = $conexion->prepare($consultarProductos);
                $result->execute();
                while ($resultado = $result->fetch(PDO::FETCH_ASSOC)) {
                    $f[] = $resultado;
                }
                return $f;
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        } else {
            echo "Error al conectar con la base de datos.";
        }
    }


    public function ver_pedidos() {
        $user_id = $_SESSION['id'];
    
        $objConexion = new Conexion();
        $conexion = $objConexion->getconexion();
        $f = null;
    
        $Buscarpedidos = "SELECT sfc_pedido_id, sfc_pedido_fecha, sfc_pedido_estado FROM sfc_pedidos WHERE fk_sfc_pedidos_usuario_id = :user_id";
        $result = $conexion->prepare($Buscarpedidos);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->execute();
    
        // Verificar si se encontraron pedidos para el usuario
        if ($result->rowCount() > 0) {
            // Si se encontraron pedidos, procesar los resultados
            while ($resultado = $result->fetch(PDO::FETCH_ASSOC)) {
                $f[] = $resultado;
            }
        } else {
            // Si no se encontraron pedidos, puedes mostrar un mensaje o devolver un valor nulo
            $f = null;
        }
    
        return $f;
    }

    public function Eliminarpedido($id) {
        $objConexion = new Conexion();
        $conexion = $objConexion->getconexion();

        try {
            // Consultar el estado del pedido
            $consultaEstado = "SELECT sfc_pedido_estado FROM sfc_pedidos WHERE sfc_pedido_id = :id";
            $stmtEstado = $conexion->prepare($consultaEstado);
            $stmtEstado->bindParam(':id', $id);
            $stmtEstado->execute();
            $pedido = $stmtEstado->fetch(PDO::FETCH_ASSOC);

            if (!$pedido) {
                echo "<script>alert('El pedido no existe');</script>";
                echo '<script>location.href = "../../../Views/client/ver_pedidos.php";</script>';
                return;
            }

            // Verificar si el pedido está entregado para proceder con la eliminación
            if ($pedido['sfc_pedido_estado'] == 'Entregado') {
                // Eliminar los detalles de pedidos asociados primero
                $eliminarDetalles = "DELETE FROM sfc_detalle_pedidos WHERE fk_sfc_detalle_pedidos_pedido_id = :id";
                $stmtDetalles = $conexion->prepare($eliminarDetalles);
                $stmtDetalles->bindParam(':id', $id);
                $stmtDetalles->execute();

                // Luego eliminar el pedido
                $eliminarPedido = "DELETE FROM sfc_pedidos WHERE sfc_pedido_id = :id";
                $stmtPedido = $conexion->prepare($eliminarPedido);
                $stmtPedido->bindParam(':id', $id);
                $stmtPedido->execute();

                echo "<script>alert('Pedido Eliminado Exitosamente');</script>";
            } else {
                echo "<script>alert('No se puede eliminar el pedido porque no está entregado');</script>";
            }

            echo '<script>location.href = "../../../Views/client/ver_pedidos.php";</script>';
        } catch (PDOException $e) {
            echo "<script>alert('Error al eliminar el pedido: " . $e->getMessage() . "');</script>";
            echo '<script>location.href = "../../../Views/client/ver_pedidos.php";</script>';
        }
    }


    public function obtenerProductos() {
        $f = null;
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        if ($conexion) {
            try {
                $consultarProductos = "SELECT sfc_producto_id, sfc_producto_nombre FROM sfc_productos";
                $result = $conexion->prepare($consultarProductos);
                $result->execute();
                while ($resultado = $result->fetch()) {
                    $f[] = $resultado;
                }
                return $f;
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        } else {
            echo "Error al conectar con la base de datos.";
        }
    }

    // Nueva función para insertar un PQR
    public function insertarPQR($fk_sfc_pqrs_productos_id, $fk_sfc_pqrs_usuario_id, $sfc_pqr_descripcion, $sfc_accion) {
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion(); // Obtener la conexión utilizando la clase Conexion

        if ($conexion) {
            try {
                $insertarPQR = "INSERT INTO sfc_pqrs (fk_sfc_pqrs_productos_id, fk_sfc_pqrs_usuario_id, sfc_pqr_descripcion, sfc_accion) 
                                VALUES (:fk_sfc_pqrs_productos_id, :fk_sfc_pqrs_usuario_id, :sfc_pqr_descripcion, :sfc_accion)";
                $result = $conexion->prepare($insertarPQR);
                $result->bindParam(':fk_sfc_pqrs_productos_id', $fk_sfc_pqrs_productos_id);
                $result->bindParam(':fk_sfc_pqrs_usuario_id', $fk_sfc_pqrs_usuario_id);
                $result->bindParam(':sfc_pqr_descripcion', $sfc_pqr_descripcion);
                $result->bindParam(':sfc_accion', $sfc_accion);
                $result->execute();
                return true; // Retorna verdadero si la inserción fue exitosa
            } catch (PDOException $e) {
                echo "Error en la inserción: " . $e->getMessage(); // Mostrar error si falla la inserción
                return false; // Retorna falso si hubo algún error
            }
        } else {
            echo "Error al conectar con la base de datos."; // Mostrar mensaje de error si no se pudo conectar
            return false; // Retorna falso si hubo algún problema de conexión
        }
    }

    public function obtenerPqrPorCodigo($codigo_unico) {
        $objConexion = new Conexion();
        $conexion = $objConexion->getconexion();
        if ($conexion) {
            try {
                $consultarPQR = "SELECT pqr.*, user.sfc_usuario_email FROM sfc_pqrs pqr 
                                 INNER JOIN sfc_usuarios user ON pqr.fk_sfc_pqrs_usuario_id = user.sfc_usuario_id 
                                 WHERE pqr.sfc_pqr_codigo = :codigo_unico";
                $result = $conexion->prepare($consultarPQR);
                $result->bindParam(':codigo_unico', $codigo_unico, PDO::PARAM_STR);
                $result->execute();
                $pqr = $result->fetch(PDO::FETCH_ASSOC);
                return $pqr;
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        } else {
            echo "Error al conectar con la base de datos.";
        }
    }

    public function registrarPerso($producto,$foto_1,$foto_2,$texto){
        session_start();
        try {
            $userID = $_SESSION['id'];
            $objConexion = new Conexion();
            $conexion = $objConexion->getconexion();
            $fecha = date("Y-m-d H:i:s");
            $insertarPedido = "INSERT INTO sfc_pedidos (fk_sfc_pedidos_usuario_id, sfc_pedido_fecha, sfc_pedido_estado) VALUES (:userId, :fecha, 'Pendiente')";
            $stmtPedido = $conexion->prepare($insertarPedido);
            $stmtPedido->bindParam(":userId", $userID);
            $stmtPedido->bindParam(":fecha", $fecha);
            $stmtPedido->execute();

            $pedidoID = $conexion->lastInsertId();

            $registrarPersonalizacion = "INSERT INTO sfc_personalizaciones(fk_sfc_personalizaciones_producto_id, sfc_personalizacion_foto, sfc_texto, sfc_foto_2, sfc_pedido_Personalizacion) VALUES (:producto,:foto1,:texto,:foto2,:pedido)";
            $result = $conexion->prepare($registrarPersonalizacion);
            $result->bindParam(':producto',$producto);
            $result->bindParam(':foto1',$foto_1);
            $result->bindParam(':foto2',$foto_2);
            $result->bindParam(':texto',$texto);
            $result->bindParam(':pedido',$pedidoID);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
        }
    }
}





    

?>
