<?php

function cargarCompra() {
    global $total;

    if (!empty($_SESSION['carrito'])) {
        $total = 0;
        foreach ($_SESSION['carrito'] as $producto) {
            $subtotal = ($producto['precio'] * $producto['stock']);
            $total += $subtotal;
            echo '
             <tbody>
                <tr class="Productos">
                    <td class="muestra" style="border-top: none;border-bottom: none;">
                        <img style="position: relative;width: 15%;" src="' . $producto['foto'] . '" alt="">
                        <div class="primera parte" style="font-size: 20px;position: relative;left: 17vh;bottom: 13vh;">
                            <h6 style="font-size: 2vh; ">' . $producto['nombre'] . '</h6>
                            <p style="font-size: 19px;">Color: ' . $producto['color'] . '</p>
                        </div>
                        <div class="segunda parte">
                            <div class="row" style="position: relative;bottom: 14vh;left: 17vh;">
                                <div style="font-size: 18px;" class="col" style="position: relative;bottom: 12vh;left: 16vh;">
                                    Talla: ' . $producto['talla'] . '
                                </div>
                                <div class="col" style="position: relative;right: 40vh;font-size: 17px;">
                                    Cantidad: ' . $producto['stock'] . '
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="position: relative;bottom: 11vh;left: 16vh;">
                                    <form action="" method="POST">
                                        <input type="hidden" name="producto_id" value="' . $producto['id_pro'] . '">
                                        <button style="position: relative;left: 6vh;bottom: 3vh;border: none;border-radius: 0;background: transparent;color: black;text-decoration: underline;" class="btn btn-primary" name="accion" value="eliminar" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="final" style="border-top: none;border-bottom: none;">
                        <div class="precio">
                            <p style="position: relative;right: 10vh;font-size: 20px;">' . number_format($producto['precio'], 0, '', '.') . '</p>
                        </div>
                    </td>
                </tr>
            </tbody>
            ';
        }
    } else {
        echo "<div class='alert alert-success' role='alert'> No hay productos en el carrito.</div>";
    }

    return $total;
}

function cargarTotal(){
    global $total;
    if(isset($total)){
        echo ' 
        <tr class="Productos">
            <td class="muestra" style="border-top: none;border-bottom: none;">
                <div class="segunda parte">
                    <div class="row">
                        <div class="col" style="font-size: 20px;position: relative;left: 8vh;">
                            Subtotal
                        </div>
                        <div class="col" style="font-size: 20px;position: relative;top: 8vh;right: 11vh;">
                            Total
                        </div>
                    </div>
                </div>
            </td>
            <td class="final" style="border-top: none;border-bottom: none;">
                <div class="subtotal" style="position: relative;left: 52vh;font-size: 15px;">
                    <p>'.number_format($total, 0  ,'', '.').'</p>
                </div>
                <div class="total" style="font-size: 15px;position: relative;left: 52vh;top: 5vh;">
                    <p>'.number_format($total, 0  ,'', '.').'</p>
                </div>
            </td>
        </tr>';
    } else {
        echo '<tr style="border-top: none;border-bottom: none;position: relative;text-align: center;left: 27vh;">
        <td style="border-top: none;border-bottom: none;" colspan="2">No se ha calculado el total.</td></tr>';
    }
}

function Informacion(){
    echo '
        <div class="container">
            <div class="seguir" style="position: relative;top: 0vh;">
                <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST"> 
                    <input type="hidden" name="accion" value="ordencreada">
                    <button style="position: relative;width: 30%;background: #0c4125;color: white;border-radius: 0;border: none;border-bottom: 2px solid;" class="btn btn-primary" type="submit">Realizar Pedido</button>
                </form>
            </div>
            <div class="seguir" style="position: relative;top: 3vh;">
                <a style="position: relative;width: 20%;background: transparent;color: #0c4125;border-radius: 0;border: none;border-bottom: 2px solid;" class="btn btn-primary" href="../../views/client/catalogo.php" role="button">Seguir Comprando</a>
            </div>
        </div>
    ';
}

?>

