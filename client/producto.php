<?php
require_once("../../controller/exterior/arreglos/Productos.php");
require_once("../../models/conexion.php");
require_once("../../models/consultas_global.php");
require_once("../../controller/exterior/arreglos/mostrarPerfil.php");
require_once("../../controller/exterior/arreglos/detalleProducto.php");
require_once("../../models/carrito.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<style>
    .btn-enviar {
      width: fit-content;
      background-color: #0fc900;
      color: #fff;
      border: 0;
      padding: 8px 20px;
      border-radius: 10px;
    }
    .overlay {
      top: 29%;
      left: 18%;
      width: 18%;
      height: 15%;
      text-align: center;
      position: absolute;
    }
    .overlay2 {
      top: 28%;
      left: 58%;
      width: 18%;
      height: 15%;
      position: absolute;
    }
    .cct {
      position: absolute;
      background-color: rgba(255, 0, 0, 0.5);
      text-align: center;
      vertical-align: middle;
    }
    .cct {
      position: absolute;
      text-align: center;
      vertical-align: middle;
    }
    .btn-cerrar {
      border-radius: 15px;
      padding: 8px 20px;
      background-color: #db4040;
      color: white;
      border: 1px solid #000;
      margin: 5px;
    }
    .overlay3{
        top: 26%;
        left: 21%;
      position: absolute;
    }
    .overlay4{
        top: 24%;
        left: 61%;
      position: absolute;
    }
    #offcanvasRight1 {
      display: block;
    }
    #offcanvasRight1 {
      overflow: hidden;
    }
    .volver-container {
        position: fixed;
        display: flex;
        margin: 0 auto;
        width: 150%;
        font-size: 10vh;
        justify-content: center;
        top: 6vh;
    }
    .btn-volver{
        padding:15px;
        height: auto;
        width: 12%;
        box-shadow: none;
        color: white;
        background: black; 
        border: none; 
        border-radius: 5px;
        font-size: 3vh;

    }
    .btn-volver:hover{
        padding:15px;
        height: auto;
        width: 12%;
        box-shadow: none;
        color: white;
        background: black; 
        border: none; 
        border-radius: 10px;
        font-size: 3vh;

    }
  </style>

<body>



    <?php
        detalleProducto();

    ?>
    <div class="volver-container">
    <a  class="btn-volver" href="../client/catalogo.php">
        <i class="bi bi-arrow-left"></i> Volver al mercado
    </a>
</div>
    <?php
    include("personalizar.html");
    ?>

    <?php
    include("footer.php");
    ?>

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
    <script>
    document.addEventListener("DOMContentLoaded", function() {
      var producto = document.getElementById('ProdAja').value;
      var prod = document.getElementById('productoId');
      prod.value = producto;

      document.querySelectorAll('.dropimage').forEach(function(img) {
        img.addEventListener('change', function(e) {
          var inputfile = this, reader = new FileReader();
          reader.onloadend = function() {
            inputfile.style['background-image'] = 'url(' + reader.result + ')';
          }
          reader.readAsDataURL(e.target.files[0]);
        });
      });

      document.getElementById('foto2').addEventListener('change', function () {
        var recu1 = document.getElementById('ct2');
        recu1.style.background = "rgb(0 255 37 / 50%)"; // Add logic to update background if needed
      });
      document.getElementById('foto1').addEventListener('change', function () {
        var recu1 = document.getElementById('ct1');
        recu1.style.background = "rgb(0 255 37 / 50%)"; // Add logic to update background if needed
      });
      document.getElementById('letra').addEventListener('input', function() {
        var outputContainer = document.getElementById('outputContainer');
        var outputContainer1 = document.getElementById('outputContainer1');
        outputContainer.textContent = this.value;
        outputContainer1.textContent = this.value;
      });
    });




        document.getElementById("letra").addEventListener("input", function() {
    // Obtén el valor actual del input
        var inputValue = this.value;

        // Si la longitud del valor es mayor que 10, recorta el texto a 10 caracteres
        if (inputValue.length > 10) {
            this.value = inputValue.slice(0, 10);
        }
        });
    </script>
</body>

</html>