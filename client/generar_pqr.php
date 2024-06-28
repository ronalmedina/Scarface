<?php
    require_once("../../controller/exterior/arreglos/Productos.php");
    require_once("../../models/conexion.php");
    require_once("../../models/consultas_global.php");
    require_once("../../controller/exterior/arreglos/mostrarPerfil.php");
    require_once("../../models/consultasCliente.php");
    require_once("../../controller/exterior/arreglos/Pedidos_usuario.php");
    require_once("../../controller/seguridadexterna.php");

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scarface | Inicio</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" href="img/logo.png" type="image/png">
    <!-- /favicon -->
    <!-- Css Styles -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- header -->
    <?php
        include("navbar.php");
    ?>
    <!-- /header -->



    <main class="generar">
        <a style="position: relative;top: 20vh;display: flex;justify-content: center;font-size: 4vh;right: 35vh;color: #0c4125;text-decoration: none !important;" href="../../views/client/soporte.php"><i class="bi bi-arrow-left"></i></a>
        <section class="formulario">
            <div class="container" style="position: relative;top: 20vh;left: 43vh;">
                <form action="../../controller/exterior/arreglos/registro_pqr.php" method="post">
                    <div class="row">
                        <div style="right:5vh;position: relative;top: 1vh;" class="col-lg-4 mb-3">
                            <label for="fk_sfc_pqrs_productos_id" class="form-label">Escoja el producto afectado</label>
                            <select style="border: none; box-shadow: 4px 4px #0c4125; background-color: transparent;" name="fk_sfc_pqrs_productos_id" class="form-select custom-select" aria-label="Default select example">
                                <option selected>Seleccione un producto</option>
                                <?php
                                $consulta = new consultascliente();
                                $productos = $consulta->obtenerProductos();

                                foreach ($productos as $producto) {
                                    echo '<option value="' . $producto['sfc_producto_id'] . '">' . $producto['sfc_producto_nombre'] . ' - ID: ' . $producto['sfc_producto_id'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="w-100"></div>

                        <div style="right:5vh;position: relative;top: 3vh;" class="col-lg-6 mb-3">
                            <label for="sfc_pqr_descripcion" class="form-label">De una descripción corta sobre lo sucedido</label>
                            <textarea style="box-shadow: 4px 4px 4px #0c4125;border-color: #0c4125;" name="sfc_pqr_descripcion" class="form-control" id="sfc_pqr_descripcion" rows="5"></textarea>
                        </div>

                        <div class="w-100"></div>

                        <div style="right:5vh;position: relative;top: 4vh;" class="col-lg-5 mb-3">
                            <label for="sfc_accion" class="form-label">Seleccione la acción que desea efectuar</label>
                            <select style="border: none; box-shadow: 4px 4px #0c4125; background-color: transparent;" name="sfc_accion" class="form-select custom-select" aria-label="Default select example">
                                <option selected>Seleccione una acción</option>
                                <option value="Rembolso">Rembolso</option>
                                <option value="Regreso">Regreso</option>
                            </select>
                        </div>

                        <input type="hidden" name="fk_sfc_pqrs_usuario_id" value="<?php echo $_SESSION['id']; ?>">
                    </div>
                    <button style="right:5vh;position: relative;top: 7vh;background: #0c4125;border: none;font-size: 20px;" class="btn btn-primary" type="submit">Enviar</button>
                </form>
            </div>
        </section>
    </main>










<!-- Footer inicia -->
<?php
    include("footer.php");
    ?>
<!-- Footer Section End -->

<!-- Search Begin -->
<!-- Search End -->

<!-- Js Plugins -->
<script src="./js/jquery-3.3.1.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.magnific-popup.min.js"></script>
<script src="./js/jquery-ui.min.js"></script>
<script src="./js/mixitup.min.js"></script>
<script src="./js/jquery.countdown.min.js"></script>
<script src="./js/jquery.slicknav.js"></script>
<script src="./js/owl.carousel.min.js"></script>
<script src="./js/jquery.nicescroll.min.js"></script>
<script src="./js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</body>

</html>