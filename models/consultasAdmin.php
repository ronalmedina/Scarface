<?php
class ConsultasAdmin{
    // REGISTRAR USUARIO CON ROL
    public function registrarUsuario($usu_nombre, $usu_apellido, $usu_email, $usu_contrasena, $fk_sfc_usuarios_rol_id){
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();

        $insertar = "INSERT INTO sfc_usuarios(sfc_usuario_nombre, sfc_usuario_apellido, sfc_usuario_email, sfc_usuario_contrasena, fk_sfc_usuarios_rol_id) VALUES (:usu_nombre, :usu_apellido, :usu_email, :usu_contrasena, :fk_sfc_usuarios_rol_id)";
        $result = $conexion->prepare($insertar);

        $result->bindParam(":usu_nombre", $usu_nombre);
        $result->bindParam(":usu_apellido", $usu_apellido);
        $result->bindParam(":usu_email", $usu_email);
        $result->bindParam(":usu_contrasena", $usu_contrasena);
        $result->bindParam(":fk_sfc_usuarios_rol_id", $fk_sfc_usuarios_rol_id);

        $result->execute();

        echo '<script>alert("Registro de usuario exitoso")</script>'; 
        echo '<script> location.href= "../../views/Admin/addusuarios.php"</script>';
    }

    // VER USUARIOS REGISTRADOS
    public function consultarUsuarios(){
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        $f=null;
        $BuscarUsers = "SELECT * FROM sfc_usuarios u INNER JOIN sfc_roles r ON u.fk_sfc_usuarios_rol_id=r.sfc_rol_id";
        $result = $conexion->prepare($BuscarUsers);
        $result->execute();
        // siempre que se haga una consulta se debe usar el fetch para convertir result en un arreglo y de está forma segmentar todo
        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }
        return $f;
    }

    // ELIMINAR USUARIO
    public function eliminarUsuario($id){
        $objConexion = new Conexion();
        $conexion = $objConexion->getconexion();
    
        $eliminar = "DELETE FROM sfc_usuarios WHERE sfc_usuario_id = :id";
        $result = $conexion->prepare($eliminar);
        $result->bindParam(':id', $id);
        
        $result->execute();
        
        echo "<script> alert('Usuario Eliminado Exitosamente')</script>";
        echo '<script> location.href="../../Views/Admin/Arrgl_Usuarios.php"</script>';
    }

    // EDITAR USUARIO
    public function editarUsuario($id){
        $f = null;
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        $consultaredic = "SELECT * FROM sfc_usuarios WHERE sfc_usuario_id = :id";
        $result = $conexion->prepare($consultaredic);
        $result->bindparam(':id',$id);
        $result->execute();
        while ($resultado = $result->fetch()){   
            $f[] = $resultado;
        }
        return $f;
    }

    // MODIFICAR USUARIO
    public function modificarUsers($id,$rol,$estado) {
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        try {
            $editarUsuario = "UPDATE sfc_usuarios SET fk_sfc_usuarios_rol_id = :rol, sfc_usuario_estado = :estado  WHERE sfc_usuario_id = :id";
            $result = $conexion->prepare($editarUsuario);
            $result->bindParam(":id", $id);
            $result->bindParam(":rol", $rol);
            $result->bindParam(":estado", $estado);
            $result->execute();
    
            echo "<script>alert('Usuario editado correctamente');</script>";
            echo '<script> location.href="../../Views/Admin/usuarios.php"</script>';
        } catch (PDOException $e) {
            echo "<script>alert('Error al editar usuario: " . $e->getMessage() . "');</script>";
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
    public function editarProducto($id){
        $f = null;
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        $consultarproducto = "SELECT p.*, c.sfc_nombre_categoria FROM sfc_productos p INNER JOIN sfc_categorias c ON p.sfc_producto_categoria_id=c.sfc_categoria_id WHERE sfc_producto_id=:id";
        $result = $conexion->prepare($consultarproducto);
        $result->bindparam(':id',$id);
        $result->execute();
        while ($resultado = $result->fetch()){   
            $f[] = $resultado;
        }
        return $f;
    }
    public function modificarProducto($id,$nombre,$precio,$descripcion,$cantidad,$personalizable,$estado){
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        try {
            $editarproducto = "UPDATE sfc_productos SET sfc_producto_nombre=:nombre, sfc_producto_descripcion=:descripcion, sfc_producto_precio=:precio, sfc_producto_stock=:cantidad, sfc_producto_personalizable=:personalizable, sfc_producto_estado=:estado WHERE sfc_producto_id = :id";
            $result = $conexion->prepare($editarproducto);
            $result->bindParam(":id", $id);
            $result->bindParam(":nombre", $nombre);
            $result->bindParam(":descripcion", $descripcion);
            $result->bindParam(":precio", $precio);
            $result->bindParam(":cantidad", $cantidad);
            $result->bindParam(":personalizable", $personalizable);
            $result->bindParam(":estado", $estado);
            $result->execute();
    
            echo "<script>alert('Producto editado correctamente');</script>";
            echo '<script> location.href="../../Views/Admin/productos.php"</script>';
        } catch (PDOException $e) {
            echo "<script>alert('Error al editar usuario: " . $e->getMessage() . "');</script>";
        }
    }
    public function mostrarUsuario($id){
        $f = null;
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        $consultarproducto = "SELECT * FROM sfc_usuarios WHERE sfc_usuario_id=:id";
        $result = $conexion->prepare($consultarproducto);
        $result->bindparam(':id',$id);
        $result->execute();
        while ($resultado = $result->fetch()){   
            $f[] = $resultado;
        }
        return $f;
    }


    // Editar perfil de sesion iniciada

    public function EditarProfile($id, $nombre, $apellidos, $email, $telefono){
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        $updateprofile ="UPDATE sfc_usuarios SET sfc_usuario_nombre=:nombre,  sfc_usuario_apellido=:apellidos, sfc_usuario_email=:email,  sfc_usuario_telefono=:telefono WHERE sfc_usuario_id = :id";
        $result = $conexion->prepare($updateprofile);
        $result->bindParam(":id", $id);
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":apellidos", $apellidos);
        $result->bindParam(":email", $email);
        $result->bindParam(":telefono", $telefono);
        $result->execute();
        echo "<script>alert('Usuario editado correctamente');</script>";
        echo '<script> location.href="../../views/Admin/editar_perfil.php"</script>';


    }

    public function cambiarpass($id,$passold,$passMD){
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        $BuscarUser = "SELECT * FROM sfc_usuarios WHERE sfc_usuario_id = :sfc_usuario_id";
        $result=$conexion->prepare($BuscarUser);
        $result->bindParam(':sfc_usuario_id',$id);
        $result->execute();
        if($f = $result->fetch()){
            if ($passold == $f['sfc_usuario_password']) {
                $NewPass ="UPDATE sfc_usuarios SET sfc_usuario_password=:clave_nw WHERE sfc_usuario_id =:sfc_usuario_id";
                $result=$conexion->prepare($NewPass);
                $result->bindParam(':sfc_usuario_id',$id);
                $result->bindParam(':clave_nw',$passMD);
                $result->execute();
                echo "<script>alert('Contraseña Actualizada');</script>";
                echo '<script> location.href="../../controller/unlogin.php"</script>';
    
            }
            else{
                echo "<script>alert('Contraseña equivocada');</script>";
                echo "<script>location.href='../../views/Admin/editar_perfil.php'</script>";
            }
        }
    }


    public function modificarFoto($id, $foto){
        $objconexion = new Conexion();
        $conexion = $objconexion->getconexion();
        $modificarFoto= "UPDATE sfc_usuarios SET sfc_usuario_foto= :sfc_usuario_foto WHERE sfc_usuario_id= :id";
        $result=$conexion->prepare($modificarFoto);
        $result->bindParam(":id", $id);
        $result->bindParam(":sfc_usuario_foto", $foto);
        $result->execute();

        echo"<script>alert('Foto actualizada correctamente');</script>";
        echo'<script> location.href="../../Views/Admin/index.php"</script>';

    }

    // Mostrar datos Dashboard

    public function Registrados() {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->getconexion();

            $consulta = "SELECT COUNT(*) AS num_usuarios FROM sfc_usuarios";
            $resultado = $conexion->query($consulta);

            $numUsuarios = $resultado->fetch(PDO::FETCH_ASSOC)['num_usuarios'];

            return $numUsuarios;
        } catch (PDOException $e) {
            echo "Error al contar usuarios registrados: " . $e->getMessage();
            return false; // Otra acción según el manejo de errores deseado
        }
    }

    public function Categorias() {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->getconexion();

            $consulta = "SELECT COUNT(*) AS num_categorias FROM sfc_categorias";
            $resultado = $conexion->query($consulta);

            $numUsuarios = $resultado->fetch(PDO::FETCH_ASSOC)['num_categorias'];

            return $numUsuarios;
        } catch (PDOException $e) {
            echo "Error al contar usuarios registrados: " . $e->getMessage();
            return false; // Otra acción según el manejo de errores deseado
        }
    }


    public function Productos() {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->getconexion();

            $consulta = "SELECT COUNT(*) AS num_productos FROM sfc_productos";
            $resultado = $conexion->query($consulta);

            $numUsuarios = $resultado->fetch(PDO::FETCH_ASSOC)['num_productos'];

            return $numUsuarios;
        } catch (PDOException $e) {
            echo "Error al contar usuarios registrados: " . $e->getMessage();
            return false; // Otra acción según el manejo de errores deseado
        }
    }


    public function PedidosTotales() {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->getconexion();

            $consulta = "SELECT COUNT(*) AS num_pedidos FROM sfc_pedidos";
            $resultado = $conexion->query($consulta);

            $numPedidos = $resultado->fetch(PDO::FETCH_ASSOC)['num_pedidos'];

            return $numPedidos;
        } catch (PDOException $e) {
            error_log("Error al contar pedidos totales: " . $e->getMessage());
            return false; // Manejo de errores según tu necesidad
        }
    }

    public function PedidosEntregados() {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->getconexion();

            $consulta = "SELECT COUNT(*) AS num_pedidos_entregados FROM sfc_pedidos WHERE sfc_pedido_estado = 'Entregado'";
            $resultado = $conexion->query($consulta);

            $numPedidosEntregados = $resultado->fetch(PDO::FETCH_ASSOC)['num_pedidos_entregados'];

            return $numPedidosEntregados;
        } catch (PDOException $e) {
            error_log("Error al contar pedidos entregados: " . $e->getMessage());
            return false; // Manejo de errores según tu necesidad
        }
    }

    public function PedidosPendientes() {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->getconexion();

            $consulta = "SELECT COUNT(*) AS num_pedidos_pendientes FROM sfc_pedidos WHERE sfc_pedido_estado = 'Pendiente'";
            $resultado = $conexion->query($consulta);

            $numPedidosPendientes = $resultado->fetch(PDO::FETCH_ASSOC)['num_pedidos_pendientes'];

            return $numPedidosPendientes;
        } catch (PDOException $e) {
            error_log("Error al contar pedidos pendientes: " . $e->getMessage());
            return false; // Manejo de errores según tu necesidad
        }
    }


    
    

    
}


// Editar clave del perfil

// Mostrar datos Dashboard



// Generacion de pqrs





?>
