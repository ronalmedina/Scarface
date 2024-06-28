<?php

function puntos($numero) {
    return number_format($numero, 0, '', '.');
}

function detalleProducto() {
    $id = $_GET['id'];
    $objConsultas = new Consultas();
    $result = $objConsultas->productoEspecifico($id);

    if (empty($result)) {
        return;
    }
    
    foreach ($result as $producto) {
        $precioFormateado = puntos($producto['sfc_producto_precio']);
        $nombre = $producto['sfc_producto_nombre'];
        $descripcion = $producto['sfc_producto_descripcion'];
        $foto1 = $producto['sfc_producto_foto_1'];
        $foto2 = $producto['sfc_producto_foto_2'];
        $foto3 = $producto['sfc_producto_foto_3'];
        $foto4 = $producto['sfc_producto_foto_4'];
        $stock = $producto['sfc_producto_stock'];

        // Verifica si el producto es personalizable
        if ($producto['sfc_producto_personalizable'] == 1) {
            $personalizable = '<div class="personalizable">
                                  <h2 style="font-size: 35px;">Personalizable</h2>
                               </div>
                               <button style="color: black;background: transparent;border: 0;border-radius: 0;border-bottom: 2px solid;box-shadow: none;position: relative;top: 35vh;right: 33vh;" 
                                       class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight1" aria-controls="offcanvasRight1">
                                   Menú de personalización<i style="position: relative; left: 5vh;" class="bi bi-arrow-right"></i>
                               </button>';
        } else {
            $personalizable = "";
        }

        echo '
        <main>
            <section class="izquierda">
                <div class="container">
                    <ul style="position: relative;width: 55%;right: 6vh;color: transparent;">
                        <li style="position: relative;top: 10vh;"><img src="' . $foto1 . '" alt=""></li>
                        <li style="position: relative;top: 10vh;"><img src="' . $foto3 . '" alt=""></li>
                        <li style="position: relative;top: 10vh;"><img src="' . $foto2 . '" alt=""></li>
                        <li style="position: relative;top: 10vh;"><img src="' . $foto4 . '" alt=""></li>
                    </ul>
                </div>
            </section>

            <section class="Derecha" style="position: fixed; top: 0; right: 0; display: flex; flex-direction: column; align-items: flex-end; padding: 20px;">
                <form action="" method="POST">
                    ' . $personalizable . '

                    <div class="Nombre" >
                        <h3 style="font-size: 30px;" class="titulo">' . $nombre . '</h3>
                    </div>

                    <div class="Precio" >
                        <p style="font-size: 30px;">$' . $precioFormateado . '</p>
                    </div>
                    <input type="hidden" value="'.$producto['sfc_producto_id'].'" id="ProdAja">

                    <div style="position: relative;display: flex;right: 34vh;top: 33vh;">
                        <select name="sfc_producto_stock" style="box-shadow: none; border: none;border-bottom: 2px solid;border-radius: 0;font-size: 2vh;" class="form-select" aria-label="Default select example">
                            <option selected>Seleccionar cantidad</option>
                            <option value="1">Uno</option>
                            <option value="2">Dos</option>
                            <option value="3">Tres</option>
                            <option value="4">Cuatro</option>
                            <option value="5">Cinco</option>
                            <option value="6">Seis</option>
                            <option value="7">Siete</option>
                            <option value="8">Ocho</option>
                            <option value="9">Nueve</option>
                            <option value="10">Diez</option>
                        </select>
                    </div>

                    <div style="position: relative;display: flex;right: 34vh;top: 35vh;">
                        <select name="sfc_producto_color" style="box-shadow: none; border: none;border-bottom: 2px solid;border-radius: 0;font-size: 2vh;" class="form-select" aria-label="Default select example">
                            <option selected>Seleccionar color</option>
                            <option value="Blanco">Blanco</option>
                            <option value="Rojo">Rojo</option>
                            <option value="Azul">Azul</option>
                            <option value="Amarillo">Amarillo</option>
                            <option value="Verde">Verde</option>
                            <option value="Negro">Negro</option>
                        </select>
                    </div>

                    <div style="position: relative;display: flex;right: 34vh;top: 38vh;">
                        <select name="sfc_producto_talla" style="box-shadow: none; border: none;border-bottom: 2px solid;border-radius: 0;font-size: 2vh;" class="form-select" aria-label="Default select example">
                            <option selected>Seleccionar talla</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    
                    <div style="position: relative;top: 18vh;">
                        <button name="accion" value="agregar" style="box-shadow: none; position: relative;top: 24vh;right: 35vh;color: white;background: black;border: none;border-radius: 50px;font-size: 3vh;width: 115%;" class="btn btn-primary" type="submit">
                            Agregar al carrito
                        </button>
                    </div>

                    <input type="hidden" name="producto_id" value="' . $id . '">
                    <input type="hidden" name="sfc_producto_nombre" value="' . $nombre . '">
                    <input type="hidden" name="sfc_producto_precio" value="' . $producto['sfc_producto_precio'] . '">
                    <input type="hidden" name="sfc_producto_foto" value="' . $foto2 . '">
                </form>
        </main>';
    }
}
?>
