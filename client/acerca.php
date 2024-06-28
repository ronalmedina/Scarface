<?php
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
    <title>Scarface | Acerca</title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Page Preloder -->


    <!-- Header -->
<?php
include("navbar.php");
?>
    
<main style="
    position: relative;
    top: 10vh;">

            


        <Section class="Sobre nosotros"  style="position: relative;top: 15vh;">

            <h2 class="Acerca">Acerca de nosotros</h2>

            <p class="Scarface">Conoce un poco de Scarface</p>

        </Section>

        <Section class="Nosotros" style="position: relative;display: flex;top: 25vh;">

            <div class="container" style="position: relative;left: 20vh;">

                <h3 class="Informacion_1">Un poco de nosotros</h3>
                <p class="Informacion_2"><span>ScarFace es una empresa dedicada a proporcionar <br>una experiencia única en moda para cada cliente. 
                    <br> Nos especializamos en la venta de prendas de alta calidad <br> para mujeres y hombres con opciones de <br> personalización que permiten a cada cliente expresar su estilo individual 
                    <br> de manera auténtica y única.</span></p>

            </div>

            <div class="container">

                <img class="" g src= "" alt="">


            </div>

        </Section>


        <section class="mision" style="position: relative;display: flex;left: 66vh;top: 30vh;">

            <div class="container" style="position: relative;left: 50vh;">


                <h3 class="Informacion_3">Nuestra Mision</h3>
                <p class="Informacion_4">Nuestra misión en ScarFace es trascender las expectativas de nuestros clientes 
                    <br> al ofrecer prendas personalizadas de la más alta calidad. 
                    <br> Nos comprometemos a inspirar confianza y comodidad, 
                    <br> manteniendo un compromiso inquebrantable con la excelencia y 
                    <br>la atención al detalle en cada paso del proceso de compra.</p>

            </div>

            <div class="container">

                <img src="" alt="">


            </div>

        </section>


        <section class="vision" style="position: relative;display: flex;top: 30vh;">

            <div class="container" style="position: relative;left: 21vh;">

                <h3 class="Informacion_5">Nuestra Vision</h3>
                <p class="Informacion_6">En ScarFace, aspiramos a ser reconocidos como líderes en la moda personalizada, 
                    <br> donde cada prenda refleje la esencia única de quien la lleva. 
                    <br> Visualizamos un futuro donde nuestra marca sea sinónimo de calidad, innovación y creatividad, 
                    <br> y donde cada cliente se sienta parte de una comunidad 
                    <br> que valora la individualidad y la expresión personal a través de la moda.</p>



            </div>

            <div class="container">


                <img src="" alt="">

            </div>

        </section>


        <section class="Valores" style="position: relative;top: 70vh;">
        <br><br><br><br>

            <div class="container">

            <div class="card text-center">
                <div class="card-header">
                    Valores como Empresa
                </div>
                <div class="card-body">
                    <h5 class="card-title">Scarface sobre una tarjeta</h5>
                    <p class="card-text">

                        <ul>

                            <li>Calidad: Nos comprometemos a ofrecer productos que cumplen con los más altos estándares de calidad en cada etapa del proceso.</li>
                            <li>Innovación: Buscamos constantemente nuevas formas de mejorar nuestros productos y procesos, desde la selección de materiales hasta la personalización.</li>
                            <li>Atención al Cliente: Nuestros clientes son nuestra máxima prioridad, y nos esforzamos por brindar un servicio excepcional en cada interacción.</li>
                            <li>Responsabilidad: Operamos de manera ética y sostenible, minimizando nuestro impacto en el medio ambiente y contribuyendo positivamente a las comunidades en las que operamos.</li>
                            <li>Inclusividad: Valoramos la diversidad en todas sus formas y nos esforzamos por ofrecer productos inclusivos y accesibles para todos.</li>


                        </ul>


                    </p>
                </div>
            </div>


            </div>



        </section>

        <section class="Compromiso" style="position: relative;display: flex;left: 116vh;">

            <div class="container">

                <h3 class="Informacion_6">Nuestro Compromiso</h3>
                <p class="Informacion_7"><span>En ScarFace, nos dedicamos a proporcionar una experiencia 
                    <br> de compra excepcional para cada cliente. Desde el primer 
                    <br> contacto hasta la entrega del producto, nuestro equipo de atención 
                    <br>al cliente está siempre disponible para ayudar y responder a 
                    <br> cualquier pregunta o inquietud que pueda surgir. 
                    <br>Nos esforzamos por hacer que el proceso de personalización 
                    <br> sea fácil y divertido,ofreciendo una amplia gama de opciones y garantizando 
                    <br> resultados que superen las expectativas de 
                    <br>  nuestros clientes en cada pedido. Además, 
                    <br> nos comprometemos a ofrecer políticas de devolución flexibles y 
                    <br> un servicio postventa excepcional para garantizar 
                    <br> la máxima satisfacción del cliente en todo momento.</span></p>
                    <br><br><br>



            </div>

            <div class="container">

                <img src="" alt="">

            </div>


        </section>


        <section class="Estrategia" style="position: relative;top: 40vh;">

            <div class="container">

            <div class="card text-center">
                <div class="card-header">
                    Estrategia como Empresa
                </div>
                <div class="card-body">
                    <h5 class="card-title">Scarface en un mapa</h5>
                    <p class="card-text">

                        <ul>

                            <li>Ampliar nuestra línea de productos para incluir más estilos y responder a un público más diverso.</li>
                            <li>Invertir en tecnologías avanzadas para mejorar la precisión y calidad de la personalización de prendas.</li>
                            <li>Fortalecer nuestra marca y aumentar el reconocimiento en el mercado a través de estrategias de marketing innovadoras y colaboraciones estratégicas.</li>
                            <li>Fomentar una comunidad de clientes leales a través de eventos, programas de fidelización y una comunicación regular y transparente.</li>
                            <li>Liderar en sostenibilidad en la moda a través de prácticas responsables de producción y distribución, y educar a nuestros clientes sobre la importancia de la moda sostenible.</li>


                        </ul>


                    </p>
                </div>
            </div>


            </div>



        </section>


            </section>
       


        


</main>


<section class="Equipo" style="position:relative;top: 72vh;height: 31%;">

                <h2 class="Grupo" style="position: relative;left: 15vh;font-size: 6vh;">Grupo Scarface</h2>
                <p class="Conoce" style="position: relative;left: 23vh;font-size: 5vh;">Conocenos</p>


                <div class="container">

                    <div class="card" style="width: 20%;position: relative;left: 30vh;bottom: 15vh;border: none;">
                        <img style="border-radius: 100vh;display: flex;width: 75%;margin: 0 auto;"  src="../../Uploads/Users/alejandro.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:2vh; position: relative;text-align: center;" class="card-text">Funciones Desempeñadas
                                <ul style="position: relative;text-align: center;">

                                    <li>Scrum</li>
                                    <li>Product Owner</li>
                                    <li>Equipo Full Stack</li>

                                </ul>
                            </p>
                        </div>
                    </div>

                    <div  class="card" style="width: 20%;left: 56vh;bottom: 55vh;border: none;">
                        <img style="border-radius: 100vh;display: flex;width: 85%;margin: 0 auto;"src="../../Uploads/Users/ronal.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style=" font-size:2vh;position: relative;text-align: center;" class="card-text">Funciones Desempeñadas

                                <ul style="position: relative;text-align: center;">
                                     <li>Equipo Full Stack</li> 

                                </ul>

                            </p>
                        </div>
                    </div>

                    <div class="card" style="width: 20%;position: relative;left: 82vh;bottom: 90vh;border: none;">
                        <img style="border-radius: 100vh;width: 70%;position: relative;display: flex;margin: 0 auto;" src="../../Uploads/Users/carol.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style=" font-size:2vh;position: relative;text-align: center;" class="card-text">Funciones Desempeñadas

                                    <ul style="position: relative;text-align: center;">
                                        <li>Equipo Front</li>
                                    </ul>

                            </p>
                        </div>
                    </div>

                    <div class="card" style="width: 20%;position: relative;left: 108vh;bottom: 125vh;border: none;">
                        <img style="position: relative;display: flex;border-radius: 100vh;width: 85%;margin: 0 auto;" src="../../Uploads/Users/catalina.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:2vh;position: relative;text-align: center;" class="card-text">Funciones Desempeñadas


                                <ul style="position: relative;text-align: center;">
                                    <li>Equipo Front</li>
                                </ul>

                            </p>
                        </div>
                    </div>
                    
                </div>
</section>


     

  





    <!-- Footer Section Begin -->

    <?php
    include("footer_2.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</body>

</html>