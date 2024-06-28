<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultasAdmin.php");


$consultasAdmin = new ConsultasAdmin();


$numUsuariosRegistrados = $consultasAdmin->Registrados();



$consultasAdmin = new ConsultasAdmin();


$Categorias = $consultasAdmin->Categorias();



$consultasAdmin = new ConsultasAdmin();


$Productos = $consultasAdmin->Productos();










?>