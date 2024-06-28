<?php
    require_once("../../controller/exterior/arreglos/Productos.php");
    require_once("../../models/conexion.php");
    require_once("../../models/consultas_global.php");
    require_once("../../models/consultasCliente.php");
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
    <a style="position: relative;top: 20vh;display: flex;justify-content: center;font-size: 4vh;left: 25vh;color: #0c4125;text-decoration: none !important;width: 8%;"  href="../../views/client/soporte.php"><i class="bi bi-arrow-left"></i></a>
        <section class="formulario">
            <div class="container" style="position: relative; top: 20vh; left: 28vh;">
                <form action="../../views/client/muestra_pqr.php" method="POST">
                    <div class="row">
                        <div style="position: relative;bottom: 4vh;" class="col-lg-6">
                            <label for="codigo_unico" class="form-label">Código Único</label>
                            <input style="box-shadow: 4px 4px 4px #0c4125;border: 2px solid #0c4125 !important;"type="text" name="codigo_unico" class="form-control" id="codigo_unico" required>
                        </div>
                    </div>
                    <button style="background: #0c4125;border: transparent;font-size: 2vh;" class="btn btn-primary mt-3" type="submit">Consultar</button>
                </form>
            </div>
        </section>
    </main>












<!-- <section class="banner set-bg" data-setbg="./img/banner/banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>Prendas</span>
                            <h1>Coleccion de Verano</h1>
                            <a href="./productos.php">Compra aquí</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>Prendas</span>
                            <h1>Coleccion de Anime</h1>
                            <a href="./productos.php">Compra aquí</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>Prendas</span>
                            <h1>Coleccion de Bandas</h1>
                            <a href="./productos.php">Compra aquí</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Banner Section End -->

<!-- Promociones de tiempo limitado -->

<!-- <section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="./img/discount.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2019</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="./productos.php">Compra aquí</a>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Promociones de tiempo limitado -->

<!-- Services Section Begin -->
<!-- <section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Devolución del dinero inmediata</h6>
                    <p>Devolución del dinero inmediatamente</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Soporte Online</h6>
                    <p>Equipo de soporte para resolver inquietudes</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Pago seguro</h6>
                    <p>Pago 100% seguro y contra entrega</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Services Section End -->


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