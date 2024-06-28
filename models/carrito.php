    <?php

    $mensaje="";

    if(isset($_POST["accion"])){
        switch($_POST["accion"]){
            case "agregar":
                if(is_numeric($_POST["producto_id"])){
                    $id_pro = $_POST["producto_id"];
                    $mensaje.= "Id correcto: ".$id_pro."<br/>";
                }else{
                    $mensaje.= "El id no es correcto: ".$id_pro;
                    break;
                }

                if(is_string($_POST["sfc_producto_nombre"])){
                    $nombre = $_POST["sfc_producto_nombre"];
                    $mensaje.= "El nombre es correcto: ".$nombre."<br/>";
                }else{
                    $mensaje.= "El nombre no es correcto: ".$nombre ."<br/>";
                    break;
                }

                if(is_numeric($_POST["sfc_producto_precio"])){
                    $precio = $_POST["sfc_producto_precio"];
                    $mensaje.= "El precio es correcto: ".$precio."<br/>";
                }else{
                    $mensaje.= "El precio no es correcto"."<br/>";
                    break;
                }

                if(is_numeric($_POST["sfc_producto_stock"])){
                    $stock = $_POST["sfc_producto_stock"];
                    $mensaje.= "La cantidad es correcta: ".$stock."<br/>";
                }else{
                    $mensaje.= "La cantidad no es correcta"."<br/>";
                    break;
                }

                if(is_string($_POST["sfc_producto_color"])){
                    $color = $_POST["sfc_producto_color"];
                    $mensaje.= "El color es correcto: ".$color."<br/>";
                }else{
                    $mensaje.= "El color no es correcto: ".$color ."<br/>";
                    break;
                }

                if(is_string($_POST["sfc_producto_talla"])){
                    $talla = $_POST["sfc_producto_talla"];
                    $mensaje.= "La talla es correcta: ".$talla."<br/>";
                }else{
                    $mensaje.= "La talla no es correcta: ".$talla ."<br/>";
                    break;
                }

                $foto = $_POST["sfc_producto_foto"];

                if(!isset($_SESSION['carrito'])){
                    $producto=array(
                        'id_pro' =>$id_pro,
                        'nombre'=>$nombre,
                        'precio'=>$precio,
                        'stock'=>$stock,
                        'color'=>$color,
                        'talla'=>$talla,
                        'foto'=>$foto
                    );
                    $_SESSION['carrito'][0]=$producto;
                    echo '<script>
                        alert("Producto agregado al carrito");</script>';
                }else{
                    $idProductos=array_column($_SESSION['carrito'],"id_pro");

                    if(in_array($id_pro,$idProductos)){
                        echo '<script>
                        alert("El producto ya ha sido seleccionado");</script>';
                    }else{
                        $numeroProductos = count($_SESSION['carrito']);
                        $producto=array(
                            'id_pro' =>$id_pro,
                            'nombre'=>$nombre,
                            'precio'=>$precio,
                            'stock'=>$stock,
                            'color'=>$color,
                            'talla'=>$talla,
                            'foto'=>$foto
                        );
                        $_SESSION['carrito'][$numeroProductos]=$producto;
                        echo '<script>
                            alert("Producto agregado al carrito");</script>';
                    }
                }
                // $mensaje = print_r($_SESSION, true);
            break;

            case "eliminar":
                if (is_numeric($_POST["producto_id"])) {
                    $id_pro = $_POST["producto_id"];
                    foreach ($_SESSION['carrito'] as $indice => $producto) {
                        if ($producto['id_pro'] == $id_pro) {
                            unset($_SESSION['carrito'][$indice]);
                            $_SESSION['carrito'] = array_values($_SESSION["carrito"]);
                            echo '<script>alert("Producto eliminado del carrito");</script>';
                            header("Location: " . $_SERVER['PHP_SELF']); // Redirigir a la misma página para evitar reenvío
                            exit();
                        }
                    }
                } else {
                    $mensaje .= "El id no es correcto: " . $id_pro;
                }
            break;

            case "sumar":
                if (is_numeric($_POST["producto_id"])) {
                    $id_pro = $_POST["producto_id"];

                    foreach ($_SESSION['carrito'] as $indice => &$producto) {
                        if ($producto['id_pro'] == $id_pro) {
                            if($producto['stock'] < 20){
                                $producto['stock']++; 
                                //no contar mas si llega a 20
                            }
                        }
                    }
                } else {
                    $mensaje .= "El id no es correcto" . $id_pro;
                }
            break;

            case "restar":
                if (is_numeric($_POST["producto_id"])) {
                    $id_pro = $_POST["producto_id"];

                    foreach ($_SESSION['carrito'] as $indice => &$producto) {
                        if ($producto['id_pro'] == $id_pro) {
                            if ($producto['stock'] > 1) {
                                $producto['stock']--; // Disminuir la cantidad si es mayor que 1
                            }
                        }
                    }
                } else {
                    $mensaje .= "El id no es correcto" . $id_pro;
                }
            break;
        }

       
        // Verificar si el usuario está logueado
        if (!isset($_SESSION['id'])) {
            echo '<script>alert("Usuario no identificado. Por favor, inicie sesión.");</script>';
            echo '<script>location.href = "../../extras/login.html";</script>'; 
            exit();
        }
        
        // Verificar si el carrito está vacío
        if (empty($_SESSION['carrito'])) {
            echo '<script>alert("El carrito está vacío.");</script>';
            echo '<script>location.href = "carro.php";</script>';
            exit();
        }
        
        // Procesar la solicitud de creación de pedido
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'ordencreada') {
            $consultas = new Consultas();
            try {
                $consultas->insertarPedido($_SESSION['id'], $_SESSION['carrito']);
                // Una vez que se crea el pedido, elimina el contenido del carrito
                unset($_SESSION['carrito']);
                echo '<script>alert("Pedido creado exitosamente");</script>';
                echo '<script>location.href = "carro.php";</script>';
            } catch (Exception $e) {
                // Manejar el error
                echo '<script>alert("Error al crear el pedido: ' . $e->getMessage() . '");</script>';
                echo '<script>location.href = "pagina_de_error.php";</script>';
            }
        }}
    ?>
