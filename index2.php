<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

session_start();

if(isset($_SESSION["registroClientes"])){
    $aClientes=$_SESSION["registroClientes"];
} else{
    $aClientes=array();
}


//preguntar si existe el archivo

if(file_exists("archivo.txt")){
//leemos y almacenamos en jsonClientes
    $jsonClientes=file_get_contents("archivo.txt");

//convertimos jsonClientes a un array llamado aClientes

    $aClientes=json_decode($jsonClientes, true);

} 

if($_POST){
    if(isset($_POST["btnEnviar"])){
                                  $dni=trim($_POST["txtDni"]);
                                  $nombre=trim($_POST["txtNombre"]);
                                  $telefono=trim($_POST["txtTelefono"]);
                                  $correo=trim($_POST["txtCorreo"]);

                $aClientes[]=array(
                                  "dni"=>$dni,
                                  "nombre"=>$nombre,
                                  "telefono"=>$telefono,
                                  "correo"=>$correo,
                                );

$_SESSION["registroClientes"]=$aClientes;

}
// boton eliminar

if(isset($_POST["btnEliminar"])){
    session_destroy();
    $aClientes=array();
}

}

//mediante GET puedo eliminar solo una fila si asi se desea

if(isset($_GET["pos"])){

    //digo que la variable pos va a ser la que tenga la info de la posicion

    $pos = $_GET["pos"];

    //Elimina con la posicion la informacion deseada

    unset($aClientes[$pos]);

    //Actualizo la variable de session con el array actualizado
    
    $_SESSION["registroClientes"] = $aClientes;
    header("Location: index2.php");
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
                        <input type="text" name="txtDni" id="txtDni" class="form-control mb-2" require>
                    </label><br>


                    <label for="">Nombre: *
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control mb-2" require>
                    </label><br>

                    <label for="">Telefono:
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control mb-2">
                    </label><br>

                    <label for="">Correo: *
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control mb-3" require>
                    </label><br>

                    <input type="file" class="mb-2" name="archivos" id="archivos" accept=".doc , .docx , .pdf">
                    <small class="d-block mb-2">Archivos admitidos: .doc, .docx, .pdf</small>

                    <button type="submit" class="btn btn-primary me-2" id="btnEnviar" name="btnEnviar">ENVIAR</button>
                    <button type="submit" class="btn btn-danger" id="bntEliminar" name="btnEliminar">ELIMINAR</button>

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
                                <td> </td>
                                <td><?php echo $cliente["dni"] ?></td>
                                <td><?php echo $cliente["nombre"] ?></td>
                                <td><?php echo $cliente["correo"] ?></td>
                                <td>
                                    <a href="index2.php?pos=<?php echo $pos; ?>" style="color:black"><i class="bi bi-trash"></i></a>
                                    <a href="" style="color:black"><i class="bi bi-pencil"></i></a>
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