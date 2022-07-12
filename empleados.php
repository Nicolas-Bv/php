<?php

ini_set("display_errors", 1);
ini_set("display_starup_errors", 1);
error_reporting(E_ALL);

$aEmpleados = array();
$aEmpleados[] = array(
    "DNI" => "33300123",
    "Nombre" => "David García",
    "Bruto" => 70550.25,
);
$aEmpleados[] = array(
    "DNI" => "40874456",
    "Nombre" => "Ana del Valle",
    "Bruto" => 74700.00,
);
$aEmpleados[] = array(
    "DNI" => "67567565",
    "Nombre" => "Andrés Perez",
    "Bruto" => 83000.00,
);
$aEmpleados[] = array(
    "DNI" => "75744545",
    "Nombre" => "Victoria Luz",
    "Bruto" => 58100.00,
);

function calcularNeto($bruto){
    return $bruto-($bruto*0.17);
};

function contar($aArray){
    $contador=0;
foreach($aArray as $item){
    $contador++;
} return $contador;
};
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 py-3 text-center">
                <h1>Listado de empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                 
                        <tr>
                            <th>DNI</th>
                            <th>Nombre y apellido</th>
                            <th>Sueldo</th>
                        </tr>
                  
                  
                        <?php
                        foreach ($aEmpleados as $empleado) {
                            $contador=0;
                            $contador++
                        ?>
                         
                            <tr>
                                <td><?php echo $empleado["DNI"];  ?></td>
                                <td><?php echo strtoupper($empleado["Nombre"]);  ?></td>
                                <td><?php echo "$ " . number_format(calcularNeto($empleado["Bruto"]), "2", ",", ".");  ?></td>
                            </tr>
                             <?php }; ?>
  
                </table>
                     
                <?php echo "Cantidad de empleados activos: " . contar($aEmpleados); ?>

            </div>
        </div>







    </div>

</body>

</html>