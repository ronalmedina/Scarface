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


        <section class="catalogo" style="position: relative;top: 12vh; background-color:#eaf5ef;">


                <div class="container text-center">
                        <div class="row">
                            <div class="col-md-8">
                                <img class="zoom-img" style="border-radius: 35px; position: relative; width: 50%; right: 25vh; top:4vh;" src="./img/categories/4.jpg" alt="">
                            </div>
                            <div class="col-6 col-md-4">
                                <img class="zoom-img" style="border-radius: 30px; position: relative; top: 5vh;" src="./img/categories/6.jpg" alt="">
                            </div>
                        </div>


            <h2 class="catalogo" style="right:2vh;position: relative;bottom: 40vh;">Todos Los Productos</h2>

        </section>

        


        <div class="Busqueda" style="position: relative;top: 12vh;">

            <p style="position: relative;display: flex;top: 2vh;font-size: 15px;justify-content: center;right: 46vh;font-size: 25px;">Todos/Categoría</p>

            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls"style="
                    position: relative;
                    display: flex;
                    justify-content: center;
                    left: 95vh;
                    bottom: 2vh;
                    width: 60%;
                    
                ">
                    <li><a class="filtro" href="<?php echo $_SERVER['PHP_SELF']; ?>">Todo</a></li>
                    <li><a class="filtro" href="<?php echo $_SERVER['PHP_SELF']; ?>?categoria=1">Masculino</a></li>
                    <li><a class="filtro" href="<?php echo $_SERVER['PHP_SELF']; ?>?categoria=2">Femenino</a></li>
                    <li><a class="filtro" href="<?php echo $_SERVER['PHP_SELF']; ?>?personalizable=1">Personalizables</a></li>
                 </ul>
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