<?php

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


//iniciamos session

session_start();

if(isset($_SESSION["listadoClientes"]))
{
    $_SESSION["listadoClientes"]=$aClientes;
}
else
{
    $aClientes=array();
}

// se actualiza la lista

$aClientes=array();

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

if($_POST){
  
    $dni=trim($_POST["txtDni"]);
    $nombre=trim($_POST["txtNombre"]);
    $telefono=trim($_POST["txtTelefono"]);
    $correo=trim($_POST["txtCorreo"]);

    $aClientes[]=array(
        "Dni"=>$dni,
        "Nombre"=>$nombre,
        "Telefono"=>$telefono,
        "Correo"=>$correo,
);


    //Convertir el array de clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almacenar el string jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);

    //
    $_SESSION["listadoClientes"]=$aClientes;

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
       
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<main class="container">
    <div class="row">
        <div class="col-12 text-center my-5">
            <h1>Registro de Clientes</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <form action="" method="post" enctype="multipart/form-data">

                <label for="">DNI:
                    <input type="text" name="txtDni" id="txtDni" class="form-control" require>
                </label> <br>

                <label for="">Nombre:
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" require>
                </label> <br>

                <label for="">Teléfono:
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                </label> <br>

                <label for="">Correo:
                    <input type="mail" name="txtCorreo" id="txtCorreo" class="form-control" require>
                </label><br>

                <input class="mt-4" type="file" name="archivo1" id="archivo1" accept=".doc, .docx, .pdf"><br>

                <small class="d-block">Archivos admitidos: .doc, .docx, .pdf.</small>

             <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">ENVIAR</button>
                <button type="reset" class="btn btn-danger">ELIMINAR</button>
            </div>
            </form>

        </div>

        <div class="col-6">
            <table class="table table-hover border shadow">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Dni</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($aClientes as $cliente){?>
                    <tr>
                        <td><?php  ?></td>
                        <td><?php echo $cliente["Nombre"] ?></td>
                        <td><?php echo $cliente["Dni"] ?></td>
                        <td><?php echo $cliente["Correo"] ?></td>
                        <td>
                            <a href=""><i class="bi bi-trash3"></i></a>
                            <a href=""><i class="bi bi-pencil"></i></a>
                        </td>
                    </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>



</body>
</html>