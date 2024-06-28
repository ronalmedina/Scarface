<?php
require_once("../../Models/conexion.php");
require_once("../../Models/consultas_global.php");
require_once("../../Models/consultasAdmin.php");

function UploadProfile() {
    $id = $_SESSION['id'];
    $objconsultas = new ConsultasAdmin();
    $result = $objconsultas->editarUsuario($id);

    if ($result !== null) { // Verificar si $result no es null
        foreach ($result as $f) {
            $rol = "";
            $foto = "";
            switch ($f['fk_sfc_usuarios_rol_id']){
                case 1:
                    $rol = "Admin";
                    break;
                case 3:
                    $rol = "Editor";
                    break;
            };
            if ($f['sfc_usuario_foto'] == NULL){
                $foto = "../../Uploads/Users/usuario.png";
            }
            else{
                $foto = $f['sfc_usuario_foto'];
            }
            echo '
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="'.$foto.'" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="'.$foto.'" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">'.$f['sfc_usuario_nombre'].' '.$f['sfc_usuario_apellido'].'</span>
                                    <small class="text-muted">'.$rol.'</small>
                                </div>
                            </div>
                        </a>
                    </li>
            ';
        }
    } else {
        // Manejar el caso en el que $result es null (no se encontraron resultados)
        echo "No se encontraron resultados para el usuario con ID: $id";
    }
}

function UploadProfile_princp(){
    $id = $_SESSION['id'];
    $objconsultas = new ConsultasAdmin();
    $result = $objconsultas->editarUsuario($id);
    foreach($result as $f){
        echo'


        <div class="card-body">
            <form action="../../controller/Admin/modificarPerfil.php"  method="POST">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <input name="id" style="display:none" value="'.$f['sfc_usuario_id'].'" type="text"
                        <label for="sfc_usuario_nombre" class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="sfc_usuario_nombre"  value="'.$f['sfc_usuario_nombre'].'" />
                    </div>


                    <div class="mb-3 col-md-6">
                        <input name="id" style="display:none" value="'.$f['sfc_usuario_id'].'" type="text"
                        <label for="sfc_usuario_apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="address" name="sfc_usuario_apellido" value="'.$f['sfc_usuario_apellido'].'" />
                    </div>
            

                    <div class="mb-3 col-md-6">
                        <input name="id" style="display:none" value="'.$f['sfc_usuario_id'].'" type="text"
                        <label for="sfc_usuario_email" class="form-label">Correo</label>
                        <input class="form-control" type="email" id="state" name="sfc_usuario_email" value="'.$f['sfc_usuario_email'].'" />
                    </div>

                    <div class="mb-3 col-md-6">
                        <input name="id" style="display:none" value="'.$f['sfc_usuario_id'].'" type="text"
                        <label for="sfc_usuario_telefono" class="form-label">Telefono</label>
                        <input class="form-control" type="number" name="sfc_usuario_telefono"  value="'.$f['sfc_usuario_telefono'].'" />
                    </div>

                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                </div>
            </form>
      </div>


    <div class="card-body">
        <form action="../../controller/Admin/modificarClave.php" method="POST">
                <div class="row">
                        <div class="form-password-toggle mb-3 col-md-6">
                            <label class="form-label" for="">Contraseña Actual</label>
                            <div class="input-group">
                            <input
                                type="password"
                                class="form-control"
                                name="passold"
                                value = "'.$f['sfc_usuario_password'].'" 
                            />
                          <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i>
                          </span>
                        </div>

                        <div class="form-password-toggle mb-6 col-md-12">
                            <label class="form-label" for="">Contraseña Nueva</label>
                            <div class="input-group">
                            <input
                                type="password"
                                class="form-control"
                                name="passnew"
                            />
                          <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i>
                          </span>
                        </div>
                        <input name="id" style="display:none" value="'.$f['sfc_usuario_id'].'" type="hidden"
                        <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terminos" value="1"/>
                                    <label class="form-check-label" for="terms-conditions">
                                        Estoy de acuerdo con
                                        <a href="javascript:void(0);">la política de privacidad y los términos</a>
                                    </label>
                                </div>
                        </div>
                
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                        </div>
                </div>
        </form>
    </div>


    <div class="card-body">
        <form action="../../controller/Admin/modificarFoto.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                        <div class="mb-3 col-md-6">
                            <input name="id" style="display:none" value="'.$f['sfc_usuario_id'].'" type="text"
                            <label for="" class="form-label">Foto</label>
                            <input class="form-control" type="file" name="sfc_usuario_foto" value="'.$f['sfc_usuario_foto'].'" accept=".jpg, .jpeg, .png, .gif"  />
                        </div>
                
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Cambiar Foto</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                        </div>
                </div>
        </form>
    </div>



     



                       
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}
?>
