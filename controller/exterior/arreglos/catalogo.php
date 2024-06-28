<?php

require_once("../../models/consultasCliente.php");

function mostrarProductos() {
    // Inicializar variables
    $categoria = null;
    $personalizable = null;
    $genero = null;

    // Verificar si se ha enviado la categoría por GET
    if (isset($_GET['categoria'])) {
        $categoria = $_GET['categoria'];
    }

    // Verificar si se ha enviado el filtro personalizable por GET
    if (isset($_GET['personalizable'])) {
        $personalizable = $_GET['personalizable'];
    }

    // Verificar si se ha enviado el filtro de género por GET
    if (isset($_GET['genero'])) {
        $genero = $_GET['genero'];
    }

    // Instanciamos la clase consultascliente
    $consultas = new consultascliente();

    // Llamamos al método correspondiente según $categoria, $personalizable o $genero
    if ($categoria !== null) {
        $productos = $consultas->CatalogoPorCategoriaID($categoria);
    } elseif ($personalizable !== null) {
        $productos = $consultas->CatalogoPersonalizables($personalizable);
    } elseif ($genero !== null) {
        $productos = $consultas->CatalogoPorGenero($genero);
    } else {
        $productos = $consultas->Catalogo();
    }
    
    if (empty($productos)) {
        echo "No hay productos disponibles.";
        return;
    }

    // Función para renderizar una sección con carousels independientes
    function renderizarSeccion($productos, $startIndex, $endIndex, $seccionClass) {
        echo '<div class="' . $seccionClass . '" style="margin-bottom: 20px; margin-top: 15vh;">
                <div class="container">
                    <div class="row" style="display: flex; overflow-x: auto; flex-wrap: nowrap;">';

        for ($i = $startIndex; $i < $endIndex && $i < count($productos); $i++) {
            $producto = $productos[$i];
            $nombre = $producto['sfc_producto_nombre'];
            $precioFormateado = number_format($producto['sfc_producto_precio'], 2); 
            $foto1 = $producto['sfc_producto_foto_1'];
            $foto2 = $producto['sfc_producto_foto_2'];
            $foto3 = $producto['sfc_producto_foto_3'];
            $foto4 = $producto['sfc_producto_foto_4'];
            $personalizable = $producto['sfc_producto_personalizable'];

            // Generar un ID único para cada carousel
            $carouselId = 'carouselExample_' . $nombre . '_' . $i;

            echo '
                <div class="col-3" style="flex: 0 0 auto; width: 25%; padding-right: 10px;">
                    <div class="card" style="border: none;">
                        <div id="' . $carouselId . '" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a href="./producto.php?id=' . $producto['sfc_producto_id'] . '">
                                        <img src="' . $foto1 . '" class="d-block w-100 zoom-on-hover" alt="..." style="width: 100%; height: auto;">
                                    </a>
                                </div>';

            if (!empty($foto2)) {
                echo '
                                <div class="carousel-item">
                                    <a href="./producto.php?id=' . $producto['sfc_producto_id'] . '">
                                        <img src="' . $foto2 . '" class="d-block w-100 zoom-on-hover" alt="..." style="width: 100%; height: auto;">
                                    </a>
                                </div>';
            }

            if (!empty($foto3)) {
                echo '
                                <div class="carousel-item">
                                    <a href="./producto.php?id=' . $producto['sfc_producto_id'] . '">
                                        <img src="' . $foto3 . '" class="d-block w-100 zoom-on-hover" alt="..." style="width: 100%; height: auto;">
                                    </a>
                                </div>';
            }

            if (!empty($foto4)) {
                echo '
                                <div class="carousel-item">
                                    <a href="./producto.php?id=' . $producto['sfc_producto_id'] . '">
                                        <img src="' . $foto4 . '" class="d-block w-100 zoom-on-hover" alt="..." style="width: 100%; height: auto;">
                                    </a>
                                </div>';
            }

            echo '
                            </div>
                        </div>
                        <div class="card-body">
                            ' . ($personalizable ? '<h5>Personalizable</h5>' : '') . '
                            <h6>' . $nombre . '</h6>
                            <p class="card-text">$' . $precioFormateado . '</p>
                        </div>
                    </div>
                </div>';
        }

        echo '</div> <!-- Cierre de row -->
            </div> <!-- Cierre de container -->
        </div> <!-- Cierre de ' . $seccionClass . ' -->';
    }

    // Renderizar las secciones según la cantidad de productos
    $numProductos = count($productos);
    $secciones = ceil($numProductos / 6); // Dividir en secciones de hasta 6 productos

    for ($seccion = 1; $seccion <= $secciones; $seccion++) {
        $startIndex = ($seccion - 1) * 6;
        $endIndex = $startIndex + 6;
        renderizarSeccion($productos, $startIndex, $endIndex, 'seccion_' . $seccion);
    }
}

?>

<style>
    .zoom-on-hover {
        transition: transform 0.3s ease;
    }

    .zoom-on-hover:hover {
        transform: scale(1.1);
    }
</style>
