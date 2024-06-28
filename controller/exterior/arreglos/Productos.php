<?php

function productosClient() {
    $objConsultas = new Consultas();
    $result = $objConsultas->productosactivos();

    if ($result === NULL) {
        echo '<h1>No hay productos agregados</h1>';
        return;
    }

    foreach ($result as $producto) {
        $precioFormateado = number_format($producto['sfc_producto_precio'], 0, '', '.');
        $categoria = $producto['sfc_producto_categoria_id'];
        $genero = $producto['sfc_producto_genero'];
        $personalizable = $producto['sfc_producto_personalizable'] == 1;
        $foto = $producto['sfc_producto_foto_1'];
        $idProducto = $producto['sfc_producto_id'];
        $nombreProducto = $producto['sfc_producto_nombre'];

        $personalizableClass = $personalizable ? ' personalizables' : '';
        $labelPersonalizable = $personalizable ? '<div class="label new">Personalizable</div>' : '';
        

        echo '
        <div class="col-lg-3 col-md-4 col-sm-6 mix ' . $genero . ' ' . $categoria . $personalizableClass . '">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="' . $foto . '">
                    ' . $labelPersonalizable . '
                    <ul class="product__hover">
                        <li><a href="./producto.php?id=' . $idProducto . '" class="image-popup"><span class="arrow_expand"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <input style="display:none" type="number" value="' . $idProducto . '">
                    <h6><a href="#">' . $nombreProducto . '</a></h6>
                    <div class="rating">
                        <!--estrellas-->
                    </div>
                    <div class="product__price">$ ' . $precioFormateado . '</div>
                </div>
            </div>
        </div>';
    }
}
?>
