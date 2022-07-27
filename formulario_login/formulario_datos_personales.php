<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){
$nombre= $_POST["txtNombre"];
$dni= $_POST["txtDni"];
$telefono= $_POST["txtTelefono"];
$edad= $_POST["txtEdad"];
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Formulario de datos personales</title>
</head>

<body>

    <main class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1>Formulario de datos personales:</h1>
            </div>
        </div>

       <div class="row">
            <div class="col-12">
                    <form action="resultados.php" method="post">
                        <div class="pb-3">
                            <label for="">Nombre: <input type="text" name="txtNombre" class="form-control" require></label>
                        </div>

                        <div class="pb-3">
                             <label for="">DNI: <input type="text" name="txtDni" class="form-control" require></label>
                        </div>

                        <div class="pb-3">
                             <label for="">teléfono: <input type="text" name="txtTelefono" class="form-control" require></label>
                        </div>

                        <div class="pb-3">
                             <label for="">Edad: <input type="number" name="txtEdad" class="form-control" require></label>
                        </div>
                  
                            <button type="submit" class="btn btn-primary">
                                ENVIAR
                            </button>
                      
                
                     </form>
            </div>
       </div>


    </main>


</body>

</html>