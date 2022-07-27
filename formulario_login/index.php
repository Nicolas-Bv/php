<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if ($_POST) 
{                                        /* pregunta si el usuario envió datos en el formulario*/
    $usuario = $_POST["txtUsuario"];                  /* se llama evento "postback"*/
    $clave = $_POST["txtClave"];

    if ($usuario != "" && $clave != "")
    {
        header("Location: acceso_confirmado.php");
    } else {
        $msj = "Válido para usuari@s registrad@s";
    }
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
    <title>Inicio</title>
</head>

<body>

    <main class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1>Formulario</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-4 pb-3">


                <?php if (isset($msj)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $msj; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-6 pb-3">
                        <label for="txtUsuario">Nombre de usuari@:</label>
                        <form action="" method="POST" action="">
                            <input type="text" name="txtUsuario" class="form-control" id="txtUsuario">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 pb-3">
                        <label for="txtClave">Contraseña:</label>
                        <input type="password" name="txtClave" class="form-control" id="txtClave">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"> ENVIAR</button>

                </form>






    </main>


</body>

</html>