<?php
class Conexion {
    public function getConexion() {
        $user = "root";
        $password = "";
        $host = "localhost";
        $dbname = "scarface";

        // Correcta cadena de conexión
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        try {
            $conexion = new PDO($dsn, $user, $password);
            // Configurar el modo de error de PDO para lanzar excepciones
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            // Manera opcional de manejar el error, puede ser logging o cualquier otro manejo de error
            die('Error de conexión: ' . $e->getMessage());
        }
    }
}
?>
