<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Preguntar si existe el archivo
if(file_exists("archivo.txt")){
    //Vamos a leerlo y almacenamos el contenido en jsonClientes
    $jsonClientes = file_get_contents("archivo.txt");

    //Convertir jsonClientes en un array llamado aClientes
    $aClientes = json_decode($jsonClientes, true);

} else {
//Si no existe el archivo
    //Creamos un aClientes inicializado como un array vació
    $aClientes = array();
}

$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";

if($_POST){
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $imagen = "";

    if($pos>=0){
        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $imagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$imagen");
            }
            //Eliminar la imagen anterior
            if($aClientes[$pos]["imagen"] != "" && file_exists("imagenes/".$aClientes[$pos]["imagen"])){
                unlink("imagenes/".$aClientes[$pos]["imagen"]);
            } 
        } else {
            //Mantener el nombreImagen que teniamos antes
            $imagen = $aClientes[$pos]["imagen"];
        }
        //Actualizar
        $aClientes[$pos] = array("dni" => $dni,
                            "nombre" => $nombre,
                            "telefono" => $telefono,
                            "correo" => $correo,
                            "imagen" => $imagen);

    } else {
        if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){
            $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
                $imagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$imagen");
            }
        }
        //Insertar
        $aClientes[] = array("dni" => $dni,
                            "nombre" => $nombre,
                            "telefono" => $telefono,
                            "correo" => $correo,
                            "imagen" => $imagen);
    }

    //Convertir el array de clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almacenar el string jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);

}

if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
   //Eliminar del array aClientes la posición a borrar unset()
    unset($aClientes[$pos]);

    //Convertir el array de clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almacenar el string jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 my-5 text-center">
                <h1>Registro de Clientes</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">

                    <label for="">Dni: *
                        <input type="text" name="txtDni" id="txtDni" class="form-control mb-2" require 
                        value="<?php echo isset($aClientes["pos"])? $aClientes[$pos]["dni"]: ""; ?>">
                    </label><br>


                    <label for="">Nombre: *
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control mb-2" require
                        value="<?php echo isset($aClientes["pos"])? $aClientes[$pos]["nombre"]: ""; ?>">
                    </label><br>


                    <label for="">Telefono:
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control mb-2"
                        value="<?php echo isset($aClientes["pos"])? $aClientes[$pos]["telefono"]: ""; ?>">
                    </label><br>


                    <label for="">Correo: *
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control mb-3" require
                        value="<?php echo isset($aClientes["pos"])? $aClientes[$pos]["correo"]: ""; ?>">
                    </label><br>


                    <input type="file" class="mb-2" name="archivos" id="archivos" accept=".png , .jpg , .jpeg">
                    <small class="d-block mb-2">Archivos admitidos: .png, .jpg, .jpeg</small>

                    <button type="submit" class="btn btn-primary me-2" id="btnEnviar" name="btnEnviar">GUARDAR</button>
                    <button type="submit" class="btn btn-danger" id="bntEliminar" name="btnEliminar">NUEVO</button>

                </form>
            </div>
       

        <div class="col-6">
                <table class="table table-hover border shadow">
                        <thead>
                            <tr>
                                <th>Imagen<th>
                                <th>Dni</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($aClientes as $pos => $cliente):?>
                            <tr>
                                <td>
                                    <?php if($cliente["imagen"] != ""):?>
                                    <img src="imagenes/<?php echo $cliente["imagen"] ?>" class="img-thumbnail"> 
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $cliente["dni"] ?></td>
                                <td><?php echo $cliente["nombre"] ?></td>
                                <td><?php echo $cliente["correo"] ?></td>
                                <td>
                                     <a style="color:black" href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="bi bi-pencil"></i></a>
                                     <a style="color:black" href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash"></i></a>
                               </td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                </table>
        </div>
        </div>

    </main>

</body>

</html>