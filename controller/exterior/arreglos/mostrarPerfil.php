<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultas_global.php");
require_once("../../Models/consultasCliente.php");

function NavbarMostrar() {
    if (!empty($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $objconsultas = new consultascliente();
        $result = $objconsultas->mostrarUser($id);
        if (!empty($result)) {
            foreach ($result as $f) {
                $rol = $f['fk_sfc_usuarios_rol_id'];
                if ($rol == 1) {
                    $entrar = '<li><a class="dropdown-item" href="../Admin/" style="font-size: 25px;background: none !important;">Ir al Rol</a></li>';
                } elseif ($rol == 3) {
                    $entrar = '<li><a class="dropdown-item" href="../editor/" style="font-size: 25px;background: none !important;">Ir al Rol</a></li>';
                } else {
                    $entrar = '';
                }

                // Contador de carrito
                $carrito_count = !empty($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0;

                echo '
                    <div class="iconos" >
                        <ul style="width: 10%;display: flex;position: relative;margin: 0 auto;left: 25%;color: transparent;bottom: 13vh;">
                            <div class="dropdown-center" style="position: relative;display: flex;left: 16px;bottom: 0vh;">
                                <button style="color: transparent;background: transparent;border-radius: 0;border: 0;box-shadow: none;" 
                                class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i style="color: #0c4125;font-size: 25px;position: relative;bottom: 5px;left: 45px;" class="bi bi-person"></i>
                                </button>
                                <ul class="dropdown-menu" style="position: absolute;inset: 0px auto auto 0px;margin: 0px;transform: translate(-47px, 52px);box-shadow: none !important;border-radius: 0 !important; width: 25vh;">
                                    <li style="position: relative;left: 22px;font-size: 20px;">Bienvenido seas '.$f['sfc_usuario_nombre'].'</li>
                                    '.$entrar.'
                                    <li><a class="dropdown-item" href="../../Controller/unlogin.php" style="font-size: 25px;background: none !important;">Cerrar sesión</a></li>
                                    <li><a class="dropdown-item" href="../../views/client/ver_pedidos.php" style="font-size: 25px;background: none !important;">Mis pedidos</a></li>
                                </ul>
                            </div>
                            <li style="position: relative;display: flex;margin: 0 auto;justify-content: center;left: 50px;bottom: 0;font-size: 25px;">
                                <a href="../../views/client/carro.php"><i class="bi bi-heart" style="color: #0c4125;"></i></a>
                            </li>
                            <li style="position: relative;display: flex;margin: 0 auto;left: 65px;bottom: 0;font-size: 25px;">
                                <a href="../../views/client/carro.php"><i class="bi bi-basket" style="color: #0c4125;">';
                                    if ($carrito_count > 0) {
                                        echo '<span style="position: absolute; top: -7px; right: -7px; font-size: 15px;">'.$carrito_count.'</span>';
                                    }
                                echo '</i></a>
                            </li>
                        </ul>
                    </div>
                ';
            }
        }
    } else {
        echo '

            <div class="iconos">
                <ul style="width: 10%;display: flex;position: relative;margin: 0 auto;left: 25%;color: transparent;bottom: 13vh;">
                    <div class="dropdown-center" style="position: relative;display: flex;left: 16px;bottom: 0vh;">
                        <button style="color: transparent;background: transparent;border-radius: 0;border: 0;box-shadow: none;" 
                        class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i style="color: black;font-size: 25px;position: relative;bottom: 5px;left: 45px;" class="bi bi-person"></i>
                        </button>
                        <ul class="dropdown-menu" style="position: absolute;inset: 0px auto auto 0px;margin: 0px;transform: translate(-47px, 52px);box-shadow: none !important;border-radius: 0 !important; width: 25vh;">
                            <li><a class="dropdown-item" href="../extras/login.html" style="font-size: 25px;background: none !important;">Iniciar Sesión</a></li>
                            <li><a class="dropdown-item" href="../extras/registro.html" style="font-size: 25px;background: none !important;">Registrarse</a></li>
                            <li><a class="dropdown-item" href="#" style="font-size: 25px;background: none !important;">Mis pedidos</a></li>
                        </ul>
                    </div>
                    <li style="position: relative;display: flex;margin: 0 auto;justify-content: center;left: 50px;bottom: 0;font-size: 25px;"><a href=""><i class="bi bi-heart" style="color: black;"></i></a></li>
                    <li style="position: relative;display: flex;margin: 0 auto;left: 65px;bottom: 0;font-size: 25px;"><a href=""><i class="bi bi-basket" style="color: black;">';
                        if (!empty($_SESSION['carrito'])) {
                            echo '<span style="position: absolute; top: -7px; right: -7px; font-size: 15px;">'.count($_SESSION['carrito']).'</span>';
                        }
                    echo '</i></a></li>
                </ul>
            </div>

             
            ';
    }
}
?>
