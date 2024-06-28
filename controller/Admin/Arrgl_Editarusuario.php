<?php

function editar_Users(){
        $id = $_GET ['id'];
        $objConsultas = new ConsultasAdmin();
        $result = $objConsultas->editarUser($id);
        foreach($result as $f){
            echo'
        <form action="../../Controllers/Admin/editar_Users.php" method="POST" enctype="multipart/form-data">
        <div class="row">

                <div class="form-group col-md-6">
                    <label>Id</label>
                    <input name="id" type="number" class="form-control" placeholder="ej. 1025566882" value='.$f['id'].' readonly = "id">
                </div>
                <div class="form-group col-md-6">
                <label>Documento</label>
                <input name="ndocumento" type="number" class="form-control" placeholder="ej. 1025566882" value='.$f['ndocumento'].'>
            </div>
                <div class="form-group col-md-6">
                    <label>Nombres</label>
                    <input name="nombre" type="text" class="form-control" placeholder="ej. juan" value='.$f['nombre'].'>
                </div>
                <div class="form-group col-md-6">
                    <label>Apellidos</label>
                    <input name="apellido" type="text" class="form-control" placeholder="ej. perez" value='.$f['apellidos'].'>
                </div>
                <div class="form-group col-md-6">
                    <label>E-mail</label>
                    <input name="email" type="email" class="form-control" placeholder="ej. correo1@gmail.com" value='.$f['email'].'>
                </div>
                <div class="form-group col-md-6">
                    <label>Telefono</label>
                    <input name="telefono" type="number" class="form-control" placeholder="ej. 3112275679" value='.$f['telefono'].'>
                </div>
                
                <div class="form-group col-md-6">
                    <label>Rol</label>
                    <select name="rol" class="form-control">
                        <option value='.$f['rol'].'>'.$f['rol'].' </option>
                        <option value="administrador">administrador</option>
                        <option value="editor">editor</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Estado</label>
                    <select name="estado" class="form-control">
                        <option value='.$f['estado'].'>'.$f['estado'].'</option>
                        <option value="Activo">Activo</option>
                        <option value="pendiente">Pendiente</option>
                    </select>
                </div>


            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Editar</button>
        
    </form>';
    }
}
?>