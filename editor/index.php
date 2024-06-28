<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultas_global.php");
require_once("../../Models/consultasAdmin.php");
require_once("../../Controller/Admin/Arrgl_mostrarprofile.php");
require_once("../../Controller/seguridad.php");
require_once("../../Controller/Admin/Dashboard.php");
?>

<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  daassets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php
          include "sidebar.php";
        ?>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
        <?php
          include "navbarAd.php";
        ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->

          <main>


            <section class="Bienvenida">

              <div class="container">

                <!-- Seccion de bienvenida -->
                  <div class="card" style="position: relative;top: 1vh;width: 88%;height: 18vh; left: 24px;">
                    <div class="card-header">
                      Bienvenido a Scarface
                    </div>
                    <div class="card-body" style="height: 16vh;position: relative;top: 2vh;width: 90%;">
                      <!-- <h5 class="card-title">Nombre</h5> -->
                      <p class="card-text">En la presente plataforma podrás gestionar las acciones de la página, sin embargo, esto dependerá de tu función como Rol</p>
                      <img style="position: relative;display: flex;left: 89vh;bottom: 128px;"src="assets/img/illustrations/man-with-laptop-light.png"height="140"alt="View Badge User"data-app-dark-img="illustrations/man-with-laptop-dark.png"data-app-light-img="illustrations/man-with-laptop-light.png"/>
                    </div>
                  </div>

                <!-- Seccion de Productos, Categorias, Usuarios  -->

                <div class="container" style="position: relative;top: 5vh;">

                    
                  <div class="col-lg-6 col-md-12 order 4">
                    <div class="row">
                      <div class="col-lg-4 col-md-12 col-6 mb-4">
                        <div class="card" style="position: relative;height: 19vh;width: 35vh;">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img
                                  src="assets/img/icons/unicons/chart-success.png"
                                  alt="chart success"
                                  class="rounded"
                                />
                              </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Usuarios registrados</span>
                            <h3 class="card-title mb-2"><?php echo $numUsuariosRegistrados; ?></h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-12 col-6 mb-4">
                        <div class="card" style="position: relative;left: 18vh;height: 19vh;width: 32vh;">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img
                                  src="assets/img/icons/unicons/wallet-info.png"
                                  alt="Credit Card"
                                  class="rounded"
                                />
                              </div>
                            </div>
                            <span>Categorias</span>
                            <h3 class="card-title mb-1"><?php echo $Categorias; ?></h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-12 col-6 mb-4">
                        <div class="card" style="position: relative;left: 35vh;height: 19vh;width: 32vh;">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img
                                  src="assets/img/icons/unicons/chart-success.png"
                                  alt="chart success"
                                  class="rounded"
                                />
                              </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Productos</span>
                            <h3 class="card-title mb-2"><?php echo $Productos ; ?></h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- Seccion de Entregado y Pendiente -->
                
                  <div class="container" style="position: relative;top: 6vh;">

                    <div id="piechart" style="width: 600px; height: 400px; display: inline-block;"></div>
                      <div style="display: inline-block; vertical-align: top; margin-left: 20px;">
                          <h4>Total de Pedidos:</h4>
                          <p id="totalPedidos"></p>
                      </div>

                  </div>

              

              </div>




            </section>



          </main>

       

    <!-- Core JS -->
    <!-- build:assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
              <?php
              $pedidosTotales = $consultasAdmin->PedidosTotales();
              $pedidosEntregados = $consultasAdmin->PedidosEntregados();
              $pedidosPendientes = $consultasAdmin->PedidosPendientes();
              ?>

              // Formato de datos para Google Charts
              var data = google.visualization.arrayToDataTable([
                  ['Estado', 'Cantidad'],
                  ['Entregados', <?php echo $pedidosEntregados; ?>],
                  ['Pendientes', <?php echo $pedidosPendientes; ?>]
              ]);

              var options = {
                  title: 'Estado de Pedidos',
                  pieHole: 0.4
              };

              var chart = new google.visualization.PieChart(document.getElementById('piechart'));

              chart.draw(data, options);

              document.getElementById('totalPedidos').innerText = '<?php echo $pedidosTotales; ?>';
          }
    </script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
