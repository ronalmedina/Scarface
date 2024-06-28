<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadDirectory = "../../Uploads/Productos/";
    $fotos = $_FILES['foto'];
    // Verifica si se cargaron archivos
    if (!empty($fotos['name'])) {
        // Recorre los archivos cargados
        for ($i = 0; $i < count($fotos['name']); $i++) {
            // Obtiene información sobre el archivo actual
            $nombreArchivo = $fotos['name'][$i];
            $tipoArchivo = $fotos['type'][$i];
            $tamañoArchivo = $fotos['size'][$i];
            $temporalArchivo = $fotos['tmp_name'][$i];
            $errorArchivo = $fotos['error'][$i];
            
            // Verifica si no hubo errores al cargar el archivo
            if ($errorArchivo === UPLOAD_ERR_OK) {
                // Mueve el archivo al directorio de destino
                $rutaDestino = $uploadDirectory . $nombreArchivo;
                if (move_uploaded_file($temporalArchivo, $rutaDestino)) {
                    echo "Archivo $nombreArchivo cargado correctamente.<br>";
                } else {
                    echo "Error al cargar el archivo $nombreArchivo.<br>";
                }
            } else {
                // Maneja el error de carga del archivo
                echo "Error al cargar el archivo $nombreArchivo: ";
                switch ($errorArchivo) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "El archivo es demasiado grande.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "El archivo no se cargó completamente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "No se seleccionó ningún archivo.";
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        echo "Falta el directorio temporal.";
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        echo "Error al escribir el archivo en el disco.";
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        echo "Carga de archivo detenida por la extensión.";
                        break;
                    default:
                        echo "Error desconocido al cargar el archivo.";
                        break;
                }
                echo "<br>";
            }
        }
    } else {
        echo "No se seleccionó ningún archivo.";
    }
}
?>
