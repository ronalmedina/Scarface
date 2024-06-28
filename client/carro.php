<?php
require_once("../../models/conexion.php");
require_once("../../models/consultas_global.php");
require_once("../../controller/exterior/arreglos/mostrarPerfil.php");
require_once("../../controller/seguridadexterna.php");
require_once("../../controller/exterior/arreglos/cargarCompra.php");
require_once("../../models/carrito.php");




?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scarface | Carro</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" href="img/logo.png" type="image/png">
    <!-- /favicon -->
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>

<body>
    <!-- Page Preloder -->


        <!-- Header -->
    <?php
        include("navbar.php");
    ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->

    <main class="carrito">


        <section style="position: relative;top: 15vh;">

            <img style="position: relative;bottom: 5vh;width: 45%;display: flex;margin: 0 auto;" src="./img/banner/1.png" alt="">

            <a style="position: relative;top: 65px;display: flex;justify-content: center;font-size: 4vh;right: 55vh;color: #0c4125;text-decoration: none !important;" href="../../views/client/catalogo.php"><i class="bi bi-arrow-left"></i></a>

            <h2 class="Pedidos" style="position: relative;display: flex;justify-content: center;width: 35%;margin: 0 auto;">Centro de Pedidos</h2>

            <div class="container">

                <table class="table">

                    <thead>
                        <tr>
                        <th style="border: none;color: transparent;" colspan="2" scope="col">Producto</th>
                        <th style="border: none;color: transparent;" colspan="2" scope="col">Precio</th>
                        </tr>
                    </thead>

                    <?php 
                    
                        cargarCompra();
                    ?>
                </table>

            </div>
        </section>


        <section class="pago" style="position: relative;top: 20vh;">


            <div class="container">

                <table class="table">

                    <thead>
                        <tr>
                        <th colspan="2" scope="col" style="border-top: none;border-bottom: none;position: relative;left: 8vh;font-size: 20px;">Precios</th>
                        <th colspan="2" scope="col" style="border-top: none;border-bottom: none;position: relative;left: 25vh;font-size: 2vh;">Muestra de precios</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 

                                cargarTotal();


                            ?>

                    </tbody>
                </table>

            </div>

           
        </section>


        <section class="informacion" style="position: relative;top: 25vh;display: flex;text-align: center;">

           <?php 

            Informacion();

           ?>

        </section>

        <section class="metodos" style="position: relative;top: 30vh;display: flex;text-align: center;">

            <div class="container">
                <h5 class="Metodo" style="font-size: 3vh;position: relative;display: flex;justify-content: center;left: 5px;">Metodos de pago</h5>
                <img src="..." alt="">
                <h6 class="Pago" style="font-size: 2vh;position: relative;top: 1vh;display: flex;justify-content: center;left: 5px;">Pago seguro</h6>
                <p class="Adicion" style="position: relative;display: flex;justify-content: center;left: 5px;top: 1vh;">No tengas miedo de tu compra, todos tus datos seran privados</p>
            </div>



        </section>

    </main>


    <!-- <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <!-- <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody> -->
                            <!-- <?php
                                cargarCompra()
                            ?> -->
                            <!-- </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
            <!-- <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="#">Continua comprando</a>
                    </div>
                </div>
            </div> -->
            <!-- <div class="row">
                <div class="col-lg-6">
            
                </div> -->
                <!-- <?php
                    cargarTotal()
                ?> -->
            <!-- </div>
        </div>
    </section> -->
    <!-- Shop Cart Section End -->


    <!-- Guia de carro anterior -->
            <!-- <tr> -->
                <!-- <td class="cart__product__item">
                    <img src="' . $producto['foto'] . '" alt="" style="max-width: 100px;" >
                    <div class="cart__product__item__title">
                        <h6>' . $producto['nombre'] . '</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </td>
                <td class="cart__price">' . number_format($producto['precio'], 0, '', '.') . '</td>
                <td class="cart__quantity">

                <div class="input-group quantity mt-4" style="width: 100px;">
                        <div class="input-group-btn">
                        <form action="" method="post">
                            <input type="hidden" name="id_pro" value="' . $producto['id_pro'] . '">
                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" name="accion" value="restar" type="submit">
                                <i class="fa fa-minus"></i>
                            </button>
                        </form>

                        </div>
                        <input type="text" class="form-control form-control-sm text-center border-0" value="'.$producto['cantidad'].'" readonly style="margin-bottom: 10px;">
                        <div class="input-group-btn">
                            <form action="" method="post">
                                <input type="hidden" name="id_pro" value="' . $producto['id_pro'] . '">
                                <button class="btn btn-sm btn-plus rounded-circle bg-light border" name="accion" value="sumar" type="submit">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                </td>
                <td class="cart__total">' . number_format($subtotal, 0, '', '.') . '</td>
                <form action="" method="post">
                    <input type="hidden" name="id_pro" value="' . $producto['id_pro'] . '">
                    <td class="cart__close"><button class="cart__close" name="accion" value="eliminar" type="submit"><span class="icon_close" ></span></button></td>
                </form>

             
            </tr> -->

            <!-- Fin del carro anterior -->

    
            <!-- Tarjeta anterior -->

            <!-- <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Total del carrito</h6>
                        <ul>
                            <li>Subtotal <span>'.number_format($total, 0  ,'', '.').'</span></li>
                            <li>Total <span>'.number_format($total, 0  ,'', '.').'</span></li>
                        </ul>

                    <div class="contenedor-btn"></div>  
                </div>
            </div> -->

            <!-- Tarjeta anterior fin -->

    
    
    
    
    
    
    
    
    
    <?php
    include("footer.php");
    ?>

    <!-- Footer Section End -->

    <!-- Search Begin -->

    <script>

    var public_key='TEST-0c3e7c14-9ab6-48e9-84dc-60aa7a26cc7b';
    const mp = new MercadoPago(public_key,{
        locale :'es-COL'
    });
    const checkout =mp.checkout({
        preference:{
            id:'<?php echo $preference->id; ?>'
        },
        render:{
            container:'.contenedor-btn',
            label:'Pagar',
        }
    });
    </script>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</body>

</html>