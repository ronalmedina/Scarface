<?php
    require_once("../../controller/exterior/arreglos/Productos.php");
    require_once("../../models/conexion.php");
    require_once("../../models/consultas_global.php");
    require_once("../../controller/exterior/arreglos/mostrarPerfil.php");
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

<body class="cuerpo">
    <!-- header -->
    <?php
        include("navbar.php");
    ?>
    <!-- /header -->

    <section  style="
        display: flex;
        justify-content: center;
        padding: 20px 20px;
        background-color: transparent;
        border: transparent;
        box-shadow: none;
        background: transparent;
        width: 100%;
    ">
        <img src="./img/categories/Fondo.jpg" alt="" style="
        padding: 20px 20px;
        border-radius: 60px;
        position: relative;
        top: 8vh;
        width:80%;
        ">
    </section>

    <section class="categorias" style="position: relative; top: 10vh;">
        <h2 class="Productos" style="position: relative; bottom: 3vh; display: flex; justify-content: center;">Explora Nuestras Categorías</h2>
        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col-6 col-sm-3">
                    <div class="categoria-item">
                        <a href="./catalogo.php">
                            <img src="./img/categories/categoria.jpg" alt="">
                            <span class="categoria-label">Todos</span>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="categoria-item">
                        <a href="./catalogo_hombre.php?genero=masculino">
                            <img src="./img/categories/categoria_1.jpg" alt="">
                            <span class="categoria-label">Hombre</span>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="categoria-item">
                        <a href="./catalogo_mujer.php?genero=mujer">
                            <img src="./img/categories/categoria_2.jpg" alt="">
                            <span class="categoria-label">Mujer</span>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="categoria-item">
                        <a href="./catalogo_personalizable.php?personalizable=1">
                            <img src="./img/categories/categoria_3.jpg" alt="">
                            <span class="categoria-label">Personalizable</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section Begin -->
<!-- Categories Section End -->












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