<?php
if (!isset($_SESSION["Autenticado"]) || $_SESSION["Autenticado"] !== "SI") {
    echo '<script>location.href = "../extras/nologin.html";</script>';
    exit; // Terminar la ejecución del script después de redireccionar
}
?>