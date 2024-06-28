<?php
// Incluir librerías necesarias
require "./code128.php"; // Archivo para generar código de barras
require "../Models/conexion.php"; // Cambia la ruta según la ubicación real de tu archivo conexion.php

// Verificar si sfc_pedido_id está definido en la URL
if (isset($_GET['sfc_pedido_id'])) {
    $pedido_id = $_GET['sfc_pedido_id'];

    // Obtener la conexión a la base de datos
    $conexion = new Conexion();
    $conn = $conexion->getConexion();

    // Consulta SQL para obtener los datos del pedido y detalles del producto
    $query = "SELECT p.sfc_producto_nombre, dp.sfc_cantidad, pr.sfc_producto_precio, u.sfc_usuario_nombre, u.sfc_usuario_email, sp.sfc_pedido_estado
              FROM sfc_pedidos sp
              JOIN sfc_detalle_pedidos dp ON sp.sfc_pedido_id = dp.fk_sfc_detalle_pedidos_pedido_id
              JOIN sfc_productos p ON dp.fk_sfc_detalle_pedidos_producto_id = p.sfc_producto_id
              JOIN sfc_usuarios u ON sp.fk_sfc_pedidos_usuario_id = u.sfc_usuario_id
              JOIN sfc_productos pr ON dp.fk_sfc_detalle_pedidos_producto_id = pr.sfc_producto_id
              WHERE sp.sfc_pedido_id = :pedido_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":pedido_id", $pedido_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        // Inicializar FPDF
        $pdf = new PDF_Code128('P', 'mm', 'Letter');
        $pdf->SetMargins(17, 17, 17);
        $pdf->AddPage();

        // Logo de la empresa formato png
        $pdf->Image('./img/logo.png', 165, 12, 35, 35, 'PNG');

        // Obtener datos del primer resultado (suponiendo que es el mismo para todos los productos)
        $nombre_usuario = $result[0]['sfc_usuario_nombre'];
        $email_usuario = $result[0]['sfc_usuario_email'];
        $estado_pedido = $result[0]['sfc_pedido_estado'];

        // Encabezado y datos de la empresa
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTextColor(32, 100, 210);
        $pdf->Cell(150, 10, iconv("UTF-8", "ISO-8859-1", strtoupper("SCARFACE")), 0, 0, 'L');
        $pdf->Ln(9);

        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "RUC: 0000000000"), 0, 0, 'L');
        $pdf->Ln(5);

        $pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", $email_usuario), 0, 0, 'L');
        $pdf->Ln(5);

        $pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Teléfono: 00000000"), 0, 0, 'L');
        $pdf->Ln(5);

        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 7, iconv("UTF-8", "ISO-8859-1", "Fecha de emisión:"), 0, 0);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(116, 7, iconv("UTF-8", "ISO-8859-1", date("d/m/Y") . " " . date("h:i A")), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", strtoupper("Factura Nro.")), 0, 0, 'C');
        $pdf->Ln(7);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(12, 7, iconv("UTF-8", "ISO-8859-1", "Usuario:"), 0, 0, 'L');
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(134, 7, iconv("UTF-8", "ISO-8859-1", $nombre_usuario), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", strtoupper($pedido_id)), 0, 0, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(12, 7, iconv("UTF-8", "ISO-8859-1", "Email:"), 0, 0, 'L');
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(134, 7, iconv("UTF-8", "ISO-8859-1", $email_usuario), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Ln(10);

        // Mostrar estado del pedido
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(0, 7, iconv("UTF-8", "ISO-8859-1", "Estado del Pedido:"), 0, 1, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(0, 7, iconv("UTF-8", "ISO-8859-1", ucfirst($estado_pedido)), 0, 1, 'L');
        $pdf->Ln(10);

        // Tabla de productos
        $pdf->SetFont('Arial', '', 8);
        $pdf->SetFillColor(23, 83, 201);
        $pdf->SetDrawColor(23, 83, 201);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(90, 8, iconv("UTF-8", "ISO-8859-1", "Descripción"), 1, 0, 'C', true);
        $pdf->Cell(25, 8, iconv("UTF-8", "ISO-8859-1", "Cantidad"), 1, 0, 'C', true);
        $pdf->Cell(32, 8, iconv("UTF-8", "ISO-8859-1", "Precio Unitario"), 1, 0, 'C', true);
        $pdf->Cell(32, 8, iconv("UTF-8", "ISO-8859-1", "Subtotal"), 1, 0, 'C', true);
        $pdf->Ln(8);

        $pdf->SetTextColor(39, 39, 51);

         // Detalles de la tabla
		 $total = 0;
		 foreach ($result as $row) {
			 $subtotal = $row['sfc_cantidad'] * $row['sfc_producto_precio']; // Calcular subtotal por producto
			 $pdf->Cell(90, 7, iconv("UTF-8", "ISO-8859-1", $row['sfc_producto_nombre']), 1, 0, 'L');
			 $pdf->Cell(25, 7, iconv("UTF-8", "ISO-8859-1", $row['sfc_cantidad']), 1, 0, 'C');
			 $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "$" . number_format($row['sfc_producto_precio'], 2)), 1, 0, 'R');
			 $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "$" . number_format($subtotal, 2)), 1, 0, 'R');
			 $pdf->Ln(7);
 
			 // Sumar al total
			 $total += $subtotal;
		 }
 
		 // Total
		 $pdf->SetFont('Arial', 'B', 10);
		 $pdf->SetFillColor(23, 83, 201);
		 $pdf->SetTextColor(255, 255, 255);
		 $pdf->Cell(147, 8, iconv("UTF-8", "ISO-8859-1", "TOTAL"), 1, 0, 'R', true);
		 $pdf->Cell(32, 8, iconv("UTF-8", "ISO-8859-1", "$" . number_format($total, 2)), 1, 0, 'R', true);
		 $pdf->Ln(10);
 
		 // Código de barras
		 $pdf->SetFont('Arial', 'B', 10);
		 $pdf->SetTextColor(39, 39, 51);
		 $pdf->Cell(0, 7, iconv("UTF-8", "ISO-8859-1", "Código de Barras:"), 0, 1, 'L');
		 $pdf->Ln(5);
 
		 // Generar código de barras usando la clase PDF_Code128
		 $pdf->Code128(85, $pdf->GetY(), $pedido_id, 60, 15);
		 
		 // Salida del PDF
		 $pdf->Output('D', 'factura.pdf');
		 exit;
	 } else {
		 echo "No se encontraron resultados para el pedido con ID: " . $pedido_id;
	 }
 } else {
	 echo "No se proporcionó un ID de pedido válido.";
 }
 ?>
