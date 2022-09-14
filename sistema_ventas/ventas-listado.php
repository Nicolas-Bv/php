<?php
include_once("config.php");
include_once("entidades/ventas.php");
include_once("header.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ventas</title>
</head>
<body>
    

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Listado de Ventas</h1>
          <div class="row">
                <div class="col-12 mb-3">
                    <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                </div>
            </div>
          <table class="table table-hover border">
            <tr>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once("footer.php"); ?>



</body>
</html>