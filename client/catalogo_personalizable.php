<?php
    require_once("../../controller/exterior/arreglos/Productos.php");
    require_once("../../models/conexion.php");
    require_once("../../models/consultas_global.php");
    require_once("../../controller/exterior/arreglos/mostrarPerfil.php");
    require_once("../../controller/exterior/arreglos/catalogo.php");
    require_once("../../models/consultasCliente.php");
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

    <main>

        <section class="muestra">

            <img style="position: relative;display: flex;margin: 0 auto;width: 65%;border-radius: 153px;top: 11vh;" src="./img/product/Mujer/Banner/4.png" alt="./producto.php">


            
            <h2 class="Personalizable_3" style="position: relative;display: flex;justify-content: center;margin: 0 auto;bottom: 22vh;">Sección Personalizable</h2>
            <p class="Personalizable_2" style="position: relative;display: grid;justify-content: center;top: 6vh;">Haz volar tu imaginación en donde Scarface forme parte de ello</p>
        
        </section>

        <a class="inicio" style="position: relative;top: 11vh;display: flex;justify-content: center;left: 55vh;font-size: 5vh;" href="../../views/client/index.php"><i class="bi bi-house-door"></i></a>


        <div class="Busqueda">

        <p style="position: relative;display: flex;top: 8vh;font-size: 15px;justify-content: center;right: 46vh;font-size: 25px;">Personalizable/Categoría</p>

            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls" style="
                    position: relative;
                    display: flex;
                    justify-content: center;
                    left: 90%;
                    bottom: 11vh;
                    width: 60%;
                ">
            </div>

        </div>
        



        <section class="Productos">

            <?php 
                
                mostrarProductos();

            ?>
            

           
           
            

        </section>


        </div>

        





    </main>



<!-- Footer inicia -->
<?php
    include("footer.php");
    ?>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
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