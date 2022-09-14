<?php
include_once("config.php");
include_once("entidades/tipoproducto.php");
include_once("header.php");

$tipoproducto = new TipoProducto();
$aTipoProductos = $tipoproducto->obtenerTodos();




?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tipo Producto Listado</title>
  <!-- CSS only -->
 


</head>

<body>
  <div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Listado de tipo de productos</h1>
    <div class="row">
      <div class="col-12 mb-3">
        <a href="tipoproducto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
      </div>
    </div>

    <table class="table table-hover border">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($aTipoProductos as $tipoProducto) : ?>
          <tr>
            <td><?php echo $tipoProducto->nombre; ?></td>
            <td><a href="tipoproducto-formulario.php?id=<?php echo $tipoProducto->idtipoproducto; ?>">Editar</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>

  </div>

  <?php include_once("footer.php"); ?>
</body>

</html>