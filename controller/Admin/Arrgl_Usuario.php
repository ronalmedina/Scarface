<?php

function editar_usuario(){
        $id = $_GET ['Id'];
        $objConsultas = new ConsultasAdmin();
        $result = $objConsultas->mostrarUsuario($id);
        foreach($result as $f){
            $rol = $f['fk_sfc_usuarios_rol_id'];
            switch ($rol) {
                case '1':
                    $rol = "Administrador";
                    break;
                case '3':
                        $rol = "Editor";
                        break;
                default:
                    $rol = "Cliente";
                    break;
            }
            $tipoDoc = ($f['sfc_usuario_tipo_documento'] == 'cc') ? "Cedula de Ciudadania" : "Cedula de Extrangeria";

            echo'
            <form action="../../controller/Admin/editar_Users.php" method="POST" enctype="multipart/form-data">


            <br><div class="row">
            <div class="col-md-6">
              <label class="form-label" for="basic-default-fullname">Nombre</label>
              <input value="'.$f['sfc_usuario_nombre'].'" name="usu_nombre" type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" readonly />
            </div>
            <div class="col-md-6">
            <input hidden value="'.$f['sfc_usuario_id'].'" name="id"/>
              <label class="form-label" for="basic-default-fullname">Apellido</label>
              <input value="'.$f['sfc_usuario_apellido'].'" name="usu_apellido" type="text" class="form-control" id="basic-default-fullname" placeholder="Perez Mollogón" readonly/>
            </div>
            </div>


            <br><div class="row">

            <div class="col-md-6">
            <label class="form-label" for="basic-default-phone">Tipo de documento</label>
            <input value="'.$tipoDoc.'" name="usu_documento" type="numer" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941" readonly/>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="basic-default-phone">Número de documento</label>
              <input value="'.$f['sfc_usuario_documento'].'" name="usu_documento" type="numer" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941" readonly/>
            </div>
            </div>

            <br><div class="row">

            <div class="col-md-6">
            <label class="form-label" for="basic-default-phone">Estado</label>
            <select name="estado" id="defaultSelect" class="form-select">
              <option>'.$f['sfc_usuario_estado'].'</option>
              <option value="activo">Activo</option>
              <option value="inactivo">Inactivo</option>
            </select>
            </div>

            <div class="col-md-6">
              <label>Correo</label>
              <input value="'.$f['sfc_usuario_email'].'" name="usu_correo" type="email" class="form-control" placeholder="ej. correo1@gmail.com" readonly>
            </div>

            </div>
            <br><div class="row">
            <div class="col-md-12">
              <label class="form-label" for="basic-default-fullname">Dirección</label>
              <input value="'.$f['sfc_usuario_direccion'].'" name="usu_direccion" type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" readonly/>
            </div>


            <br><div class="row">
            <div class="col-md-6">
              <label>Rol</label>
              <select name="rol" class="form-control">
                <option value="'.$f['fk_sfc_usuarios_rol_id'].'">'.$rol.'</option>
                <option value="1">Administrador</option>
                <option value="2">Cliente</option>
                <option value="3">Editor</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="basic-default-phone">Telefono</label>
              <input value="'.$f['sfc_usuario_telefono'].'" name="usu_telefono" type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941" readonly/>
              <br><br>
            </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
            ';
    }
}
?>