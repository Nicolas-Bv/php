<?php
include_once("config.php");
include_once("entidades/producto.php");
include_once("entidades/tipoproducto.php");
include_once("header.php");

$producto= new Producto;
$producto->cargarFormulario($_REQUEST);

if($_POST){
    if(isset($_POST["btnGuardar"])){ //guardo imagen
        $imagen="";
        if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
            $archivo_tmp = $_FILES["imagen"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $imagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$imagen");
            }
    }



    if (isset($_GET["id"]) && $_GET["id"] > 0) {
        $producto->actualizar();
}

}
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>producto</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
</head>

<body>


    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tipo de productos</h1>
        <div class="row">
            <div class="col-12 mb-3">
                <a href="producto-listado.php" class="btn btn-primary mr-2">Listado</a>
                <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
            </div>
        </div>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <label for="">Nombre
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </label>
                </div>
                <div class="col-6">
                    <label for="">cantidad
                        <input type="number" name="txtCantidad" id="txtCantidad" class="form-control">
                    </label>
                </div>
            </div>
   

    <div class="row">
        <div class="col-6">
            <label for="">tipo de producto
                <select name="lstTipoProducto" id="lstTipoProducto" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </label>
        </div>
        <div class="col-6">
            <label for="">precio
                <input type="number" name="txtPrecio" id="txtPrecio" class="form-control">
            </label>
        </div>


        <div class="col-12">
        Descripcion:
        <textarea type="text" name="txtDescripcion" id="txtDescripcion"></textarea>
         </div> 

    <div class="row mt-3 my-2 mx-2">
        <div class="col-12">
        Imagen: <br>
        <input type="file" src="imagenes/" name="imagen" id="imagen" accept=".jpg, .jpeg, .png">
    </div>
    </div>

  
    </form>

    </div>









    <!-- End of Main Content -->
    <?php include_once("footer.php"); ?>
</body>

<script>
    ClassicEditor
        .create(document.querySelector('#txtDescripcion'))
        .catch(error => {
            console.error(error);
        });
</script>

</html>