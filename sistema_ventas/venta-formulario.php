<?php 
include_once("config.php");
include_once("entidades/ventas.php");
include_once("entidades/producto.php");
include_once("entidades/cliente.php");
include_once("header.php");


if($_POST["btnGuardar"]){
    $tipoproducto= new TipoProducto();
    $tipoproducto->cargarFormulario($_REQUEST);
    $tipoproducto->insertar();
}

?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Ventas</h1>
 <div class="row">
      <div class="col-12 mb-3">
          <a href="tipoproductos.php" class="btn btn-primary mr-2">Listado</a>
          <a href="tipoproducto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
          <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
          <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
      </div>
  </div>
  <div class="row">
      <div class="col-12 form-group">
          <label for="txtNombre">Nombre:</label>
          <input type="text" required="" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $tipoproducto->nombre; ?>">
      </div>
  </div>
</div>

<form action="" method="post">

<label for="">
    <input type="text">
</label>


</form>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once("footer.php"); ?>
