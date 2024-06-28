<?php

function editar_Producto(){
        $id = $_GET ['id'];
        $objConsultas = new ConsultasAdmin();
        $result = $objConsultas->editarProducto($id);
        foreach($result as $f){
            $precio = number_format($f['sfc_producto_precio'], 0, '', '');
            $personalizable = $f['sfc_producto_personalizable'];
            if($personalizable==1){
                $personalizable="si se puede";
                $personalizablev = 1;
            }
            else{
                $personalizable = "no se puede";
                $personalizablev = 0;
            }
            echo'

            <div class="container">
        <!-- Navegación de pestañas -->
        <ul class="nav nav-tabs" id="myTab" role="tablist" style="box-shadow: 0px 1px 5px;padding: 8px;">
            <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos Basicos</button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Cambiar fotos</button>
            </li>
        </ul>

        <!-- Contenido de las pestañas -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form action="../../controller/Admin/editar_producto.php" method="POST" enctype:multipart/form-data style="box-shadow: 0px 0px 1px; padding: 10px;">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="basic-default-fullname">Nombre</label>
                        <input name="id" type="hidden" value="'.$f['sfc_producto_id'].'"/>
                        <input name="nombre" type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" value="'.$f['sfc_producto_nombre'].'" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="basic-default-fullname">Precio</label>
                        <input name="precio" type="number" class="form-control" id="basic-default-fullname" placeholder="0.00" value="'.$precio.'" />
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label" for="basic-default-company">Descripción</label>
                        <textarea name="descripcion" class="form-control" id="basic-default-company" placeholder="ACME Inc.">'.$f['sfc_producto_descripcion'].'</textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="basic-default-phone">Cantidad</label>
                        <input name="cantidad" type="number" class="form-control phone-mask" id="basic-default-phone" placeholder="100" value="'.$f['sfc_producto_stock'].'" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="basic-default-phone">Categoría</label>
                        <input name="categoria" type="text" class="form-control phone-mask" id="basic-default-phone" placeholder="231" value="'.$f['sfc_nombre_categoria'].'" readonly />
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="basic-default-phone">Personalizable</label>
                        <select name="personalizable" id="defaultSelect" class="form-select">
                            <option value="'.$personalizablev.'">'.$personalizable.'</option>
                            <option value="1">Sí se puede</option>
                            <option value="0">No se puede</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="basic-default-phone">Color</label>
                        <input name="color" type="text" class="form-control phone-mask" id="basic-default-phone" placeholder="231" value="'.$f['sfc_producto_color'].'" readonly />
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="basic-default-phone">Género</label>
                        <input name="genero" type="text" class="form-control phone-mask" id="basic-default-phone" placeholder="231" value="'.$f['sfc_producto_genero'].'" readonly />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="basic-default-phone">Talla</label>
                        <input name="talla" type="text" class="form-control phone-mask" id="basic-default-phone" placeholder="231" value="'.$f['sfc_producto_talla'].'" readonly />
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="../../controller/Admin/editar_fotos_producto.php" method="POST" enctype="multipart/form-data" style="box-shadow: 0px 0px 1px;padding: 10px;">

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="basic-default-fullname">Foto 1</label>
                                <input name="foto[]" type="file" class="form-control" id="basic-default-fullname" placeholder="John Doe"/>
                            </div>
                            <br><div class="col-md-6">
                                <label class="form-label" for="basic-default-fullname">Foto 2</label>
                                <input name="foto[]" type="file" class="form-control" id="basic-default-fullname" placeholder="John Doe"/>
                            </div>
                        </div>

                        <div class="row">
                        <br><div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Foto 3</label>
                            <input name="foto[]" type="file" class="form-control" id="basic-default-fullname" placeholder="John Doe"/>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Foto 4</label>
                            <input name="foto[]" type="file" class="form-control" id="basic-default-fullname" placeholder="John Doe"/>
                        </div>
                        </div>
                        <br><button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
            </div>
        </div>
        </div>';
    }
}
?>