<?php
ini_set("display_errors", 1);
ini_set("display_starup_errors", 1);
error_reporting(E_ALL);

$aProductos = array();

$aProductos[] = array("Nombre" => "SMART TV 55\" 4K UHD",
                     "Marca" => "Hitachi", 
                     "Modelo" => "554KS20", 
                     "Stock" => 60, 
                     "Precio" => 58000);

$aProductos[]= array("Nombre" => "Samsung Galaxy A30 Blanco", 
                     "Marca" => "Samsung", 
                     "Modelo" => "Galaxy A30", 
                     "Stock" => 0, 
                     "Precio" => 22000);

$aProductos[]= array("Nombre" => "Aire Acondicionado Aire Split Inverter Frío/Calor Surrey 2900F",
                     "Marca" => "Surrey", 
                     "Modelo" => "553AIQ1201E",
                     "Stock" => 5, 
                     "Precio" => 45000);





?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listados de productos</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

<main class="container">
  <div class="row">
        <div class="col-12 text-center py-5">
            <h1>Lista de Productos</h1>
        </div>
  </div>
</div>

  <div class="row">
    <div class="col-12">
       <table class="table table-hover border">
           
       <thead>
         <tr>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Acción</th>
         </tr>
       </thead>
         
       <tbody>
         <tr>
            <td><?php echo $aProductos[0]["Nombre"]; ?></td>
            <td><?php echo $aProductos[0]["Marca"]; ?></td>
            <td><?php echo $aProductos[0]["Modelo"]; ?></td>
            <td><?php echo $aProductos[0]["Stock"] >10 ? "Hay Stock" : ($aProductos[0]["Stock"] >0 && $aProductos[0]["Stock"] <= 10? "Hay poco Stock": "No hay Stock"); ?></td>
            <td><?php echo $aProductos[0]["Precio"]; ?></td>            
            <td><button class="btn btn-primary">Comprar</button></td>
         </tr>

         <tr>
            <td><?php echo $aProductos[1]["Nombre"]; ?></td>
            <td><?php echo $aProductos[1]["Marca"]; ?></td>
            <td><?php echo $aProductos[1]["Modelo"]; ?></td>
            <td><?php echo $aProductos[1]["Stock"] >10 ? "Hay Stock" : ($aProductos[1]["Stock"] >0 && $aProductos[1]["Stock"] <= 10? "Hay poco Stock": "No hay Stock"); ?></td>
            <td><?php echo $aProductos[1]["Precio"]; ?></td>
            <td><button class="btn btn-primary">Comprar</button></td>
         </tr>

         <tr>
            <td><?php echo $aProductos[2]["Nombre"]; ?></td>
            <td><?php echo $aProductos[2]["Marca"]; ?></td>
            <td><?php echo $aProductos[2]["Modelo"]; ?></td>
            <td><?php echo $aProductos[2]["Stock"] >10 ? "Hay Stock" : ($aProductos[2]["Stock"] >0 && $aProductos[2]["Stock"] <= 10? "Hay poco Stock": "No hay Stock"); ?></td>
            <td><?php echo $aProductos[2]["Precio"]; ?></td>
            <td><button class="btn btn-primary">Comprar</button></td>
         </tr>

       </tbody>  
     </table>
    </div>
  </div>
</main>


</body>

</html>