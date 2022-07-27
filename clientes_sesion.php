<?php

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

session_start();

if(isset($_SESSION["listadoClientes"]))
{
    $_SESSION["listadoClientes"]=$aClientes;
}
else
{
    $aClientes=array();
}
//se actualiza el contenido de la variable

$aClientes=array();

if($_POST){
$nombre=$_POST["txtNombre"];
$dni=$_POST["txtDni"];
$telefono=$_POST["txtTelefono"];
$edad=$_POST["txtEdad"];

$aClientes[]=array(
            "Nombre"=>$nombre,
            "Dni"=>$dni,
            "Telefono"=>$telefono,
            "Edad"=>$edad
);

$_SESSION["listadoClientes"]=$aClientes;

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cientes sesión</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

    <main class="container">
        <div class="row">
            <div class="col-12 mt-4 text-center">
                <h1>Lista de clientes</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <form action="" method="post" class="form">
                    <label for="txtNombre">Nombre:
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control pt-2" placeholder="Nombre completo">
                    </label><br>

                    <label for="txtDni">DNI:
                        <input type="text" name="txtDni" id="txtDni" class="form-control pt-2">
                    </label><br>

                    <label for="txtTelefono">Teléfono:
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control pt-2">
                    </label><br>

                    <label for="txtEdad">Edad:
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control pt-2">
                    </label><br>

                    <button type="submit" class="btn btn-primary mt-4 shadow">ENVIAR</button> 
                    <button type="reset" class="btn btn-danger mt-4 shadow">ELIMINAR</button>
                </form>

            </div>

            <div class="col-6 pt-3">
                <table class="table table-hover border shadow">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Teléfono</th>
                            <th>Edad</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($aClientes as $cliente): ?>
                        <tr>
                            <td><?php echo $cliente["Nombre"] ?></td>
                            <td><?php echo $cliente["Dni"] ?></td>
                            <td><?php echo $cliente["Telefono"] ?></td>
                            <td><?php echo $cliente["Edad"] ?></td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>


        </div>

    </main>

</body>

</html>