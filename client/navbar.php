<!-- Offcanvas Menu Begin -->
                <!-- <div class="offcanvas-menu-overlay"></div>
                    <div class="offcanvas-menu-wrapper">
                        <div class="offcanvas__close">+</div>
                        <h4 style="
                        text-align: center;">Bienvenid@ 🙌</h4>
                        <br>
                        <ul class="offcanvas__widget">
                            <?php
                                NavbarMostrar();
                            ?>
                            <li><a href="carro.php"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                        </ul>
                        <div class="offcanvas__logo">
                            <a href="./index.php"><img src="img/logo.png" alt=""></a>
                        </div>
                        <div id="mobile-menu-wrap"></div>
                </div> -->
                <!-- Offcanvas Menu End -->

                <!-- Anterior navbar de rol -->

                <!-- Variable de entrar antes -->

                <!-- <i class="fa fa-briefcase" aria-hidden="true">
                <i class="fa fa-briefcase" aria-hidden="true"> -->

                <!-- Fin de variable de entrar antes -->

                <!-- <li>
                        <div class="dropdown">
                            <button class=" btn btn-dpwn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="fa fa-user"></span>
                            </button>
                            <div class="dropdown_menu">
                                <ul class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 35px);">
                                    <li style="margin-left:15px">Bienvenid@ '.$f['sfc_usuario_nombre'].'</li>
                                    '.$entrar.'
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Usuario</a></li> 
                                    <li><a class="dropdown-item" href="../../Controller/unlogin.php"><i class="fa fa-power-off"></i> Cerrar sesión</a></li>
                                </ul>
                            </div>
                        </div>
                    </li> -->

                <!-- Fin del anterior navbar de rol -->



                <!-- Configuracion Header --> 
                 
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                <!-- Fin de Configuracion Header -->

                <header class="header" style="display: block;position: fixed;height: 10%;left: 0;top: 0;width: 100%;z-index: 1000; box-shadow:none;">
                    <div class="container-fluid">
                        <div id="sideNavigation" class="sidenav">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <a href="./index.php">INICIO</a>
                            <a href="./catalogo.php">PRODUCTOS</a>
                            <a href="./soporte.php">SOPORTE</a>
                            <a href="./acerca.php">ACERCA DE NOSOTROS</a>
                        </div>

                        <nav class="topnav" style="position: relative;display: flex;width: 8%;height: 5vh;justify-content: center;margin: 0 auto;left: 40%;top: 3vh;background: transparent;">
                            <a href="#" onclick="openNav()">
                                <svg width="30" height="30" id="icoOpen">
                                    <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
                                    <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
                                    <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
                                </svg>
                            </a>

                            <p style="
                                position: relative;
                                display: flex;
                                top: 15px;
                            ">Menu</p>
            
                        </nav>

                    <h1 class="marca" style="position: relative;display: flex;margin: 0 auto;width: 50%;font-size: 10vh;justify-content: center;bottom: 6vh;">SCARFACE</h1>

                    <?php 
                        NavbarMostrar();
                    ?>
                    

                    <script>
                        function openNav(){
                            document.getElementById("sideNavigation").style.width = "350px";
                            document.getElementById("main").style.marginLeft = "350px";
                        }

                        function closeNav(){
                            document.getElementById("sideNavigation").style.width = "0";
                            document.getElementById("main").style.marginLeft = "0";
                        }
                    </script>

                    </div>
                    
                    
                    <!-- <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-3 col-lg-2">
                                <div class="header__logo">
                                    <a href="./index.php"><img src="img/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <nav class="header__menu">
                                    <ul>
                                        <li><a href="./index.php">Inicio</a></li>
                                        <li><a href="./productos.php">tienda</a></li>
                                        <li><a href="./acerca.php">Acerca de Nosotros</a></li>
                                        <li><a href="./contacto.php">Contactanos</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-lg-3">
                                <div class="header__right">
                                    <ul class="header__right__widget">
                                        <?php
                                            NavbarMostrar();
                                        ?>
                                        <li><span class="icon_search search-switch"></span></li>
                                        <li><a href="carro.php"><span class="icon_heart_alt"></span>
                                            <div class="tip">
                                                
                                            <?php 
    
                                                echo(empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
                                            ?></div>
                                        </a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span>
                                            <div class="tip">2</div>
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="canvas__open">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div> -->
                </header>
                <!-- Header Section End -->