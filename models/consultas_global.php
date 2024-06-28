<?php
session_start();

class Consultas {
    public function registrarUsuarioExterno($nombre, $apellido, $correo, $tipoDocumento, $documento, $claveMD, $estado, $rol, $foto) {
        // Creamos objeto conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        try {
            $insertar = "INSERT INTO sfc_usuarios (sfc_usuario_nombre, sfc_usuario_apellido, sfc_usuario_email, sfc_usuario_tipo_documento, sfc_usuario_documento, sfc_usuario_password, sfc_usuario_estado, fk_sfc_usuarios_rol_id, sfc_usuario_fecha, sfc_usuario_foto) VALUES (:nombre, :apellido, :correo, :tipoDocumento, :documento, :clave, :estado, :rol, NOW(), :foto)";

            // Preparamos la consulta (INSERT)
            $result = $conexion->prepare($insertar);

            // Convertimos los argumentos en parámetros
            $result->bindParam(":foto",$foto);
            $result->bindParam(":nombre", $nombre);
            $result->bindParam(":apellido", $apellido);
            $result->bindParam(":correo", $correo);
            $result->bindParam(":tipoDocumento", $tipoDocumento);
            $result->bindParam(":documento", $documento);
            $result->bindParam(":clave", $claveMD);
            $result->bindParam(":estado", $estado);
            $result->bindParam(":rol", $rol);

            // Ejecutamos la consulta
            $result->execute();

            // Si se ejecutó correctamente, mostramos un mensaje de éxito y redirigimos
            echo '<script>alert("Se ha registrado exitosamente")</script>';
            echo '<script>location.href="../Views/extras/login.html"</script>'; 
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                echo '<script>alert("Hay un usuario con esas credenciales registradas")</script>';
                echo '<script>location.href="../Views/extras/login.html"</script>';
            } else {
                echo '<script>alert("No se ha podido registrar al usuario")</script>';
                echo '<script>location.href="../Views/extras/registro.html"</script>';
            }
        }
    }
    
    public function validarSesion($email, $pass) {
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();
    
        try {
            // Guardamos en una variable la consulta de MySQL a ejecutar
            $consultar = "SELECT * FROM sfc_usuarios WHERE sfc_usuario_email = :email OR sfc_usuario_documento = :email";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":email", $email);
            $result->execute();
    
            // Verificamos si hay resultados
            if ($f = $result->fetch()) {
                // Validamos la clave
                if ($pass == $f['sfc_usuario_password']) {
                    // Validamos el estado de la cuenta
                    if ($f['sfc_usuario_estado'] == "activo") {
                        // Se inicia la sesión
                        // Creamos variables de sesión global para usar más adelante
                        $_SESSION['id'] = $f['sfc_usuario_id'];
                        $_SESSION['rol'] = $f['fk_sfc_usuarios_rol_id'];
                        $_SESSION['email'] = $f['sfc_usuario_email'];
                        // Autenticado es la que no permite el ingreso en la plataforma por URL
                        $_SESSION['Autenticado'] = "SI";
    
                        // Validamos el rol para redireccionar
                        switch ($f['fk_sfc_usuarios_rol_id']) {
                            // Administrador
                            case 1:
                                if ($_SESSION['rol'] == 1) {
                                    echo '<script>location.href = "../Views/Admin/";</script>';
                                    exit();
                                }
                                break;
                            // Cliente
                            case 2:
                                if ($_SESSION['rol'] == 2) {
                                    echo '<script>location.href = "../";</script>';
                                    exit();
                                }
                                break;
                            // Editor
                            case 3:
                                if ($_SESSION['rol'] == 3) {
                                    echo '<script>location.href = "../Views/editor/";</script>';
                                    exit();
                                }
                                break;
                        }
    
                        echo '<script>alert("No tiene permisos para acceder a esta página.");</script>';
                        echo '<script>location.href = "../Views/extras/error.php";</script>';
                        exit();
                    } else {
                        echo '<script>alert("El estado de su cuenta actualmente es inactivo");</script>';
                        echo '<script>location.href = "../Views/extras/login.html";</script>';
                    }
                } else {
                    echo '<script>alert("La información no coincide, por favor ingrese nuevamente");</script>';
                    echo '<script>location.href = "../Views/extras/login.html";</script>';
                }
            } else {
                echo '<script>alert("La información no coincide con ningún usuario, cree una cuenta");</script>';
                echo '<script>location.href = "../Views/extras/registro.html";</script>';
            }
        } catch (PDOException $e) {
            echo '<script>alert("Error en la base de datos: ' . $e->getMessage() . '");</script>';
            echo '<script>location.href = "../Views/extras/error.php";</script>';
        }
    }
    

    public function cerrarSesion() {
        session_destroy();
        echo '<script>location.href = "../index.php" </script>';
    }

    public function productosActivos() {
        $f=null;
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        $consultarProductos = "SELECT * FROM sfc_productos p INNER JOIN sfc_categorias c ON p.sfc_producto_categoria_id = c.sfc_categoria_id WHERE p.sfc_producto_estado = 'activo'";
        $result = $conexion->prepare($consultarProductos);
        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function productoEspecifico($id) {
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        $consultarProducto = "SELECT * FROM sfc_productos p INNER JOIN sfc_categorias c ON p.sfc_producto_categoria_id = c.sfc_categoria_id WHERE p.sfc_producto_id = :id";
        $result = $conexion->prepare($consultarProducto);
        $result->bindParam(":id", $id);
        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }



    public function insertarPedido($userId, $cartItems) {
        // Conexión a la base de datos
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();
    
        // Fecha actual
        $fecha = date("Y-m-d H:i:s");
    
        try {
            // Iniciar transacción
            $conexion->beginTransaction();
    
            // Insertar el pedido
            $insertarPedido = "INSERT INTO sfc_pedidos (fk_sfc_pedidos_usuario_id, sfc_pedido_fecha, sfc_pedido_estado) VALUES (:userId, :fecha, 'Pendiente')";
            $stmtPedido = $conexion->prepare($insertarPedido);
            $stmtPedido->bindParam(":userId", $userId);
            $stmtPedido->bindParam(":fecha", $fecha);
            $stmtPedido->execute();
    
            // Obtener el ID del pedido recién insertado
            $pedidoId = $conexion->lastInsertId();
    
            // Insertar los detalles del pedido (productos)
            foreach ($cartItems as $producto) {
                $insertarDetalle = "INSERT INTO sfc_detalle_pedidos (fk_sfc_detalle_pedidos_pedido_id, fk_sfc_detalle_pedidos_producto_id, sfc_cantidad) VALUES (:pedidoId, :productoId, :sfc_cantidad)";
                $stmtDetalle = $conexion->prepare($insertarDetalle);
                $stmtDetalle->bindParam(":pedidoId", $pedidoId);
                $stmtDetalle->bindParam(":productoId", $producto['id_pro']);
                $stmtDetalle->bindParam(":sfc_cantidad", $producto['stock']);
                $stmtDetalle->execute();
            }
    
            // Confirmar la transacción
            $conexion->commit();
        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            $conexion->rollBack();
            throw new Exception("Error al crear el pedido: " . $e->getMessage());
        }
    }
}

?>
