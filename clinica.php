<?php

ini_set("display_errors", 1);
ini_set("display_starup_errors", 1);
error_reporting(E_ALL);


$aPacientes = array();
$aPacientes[] = array(
    "DNI" => "29.765.012",
    "Nombre" => "Ana Acuña", 
    "Edad" => 45, 
    "Peso" => 81.50,
);

$aPacientes[] = array
    ("DNI" => "14.684.385",
    "Nombre" => "Gonzalo Bustamante", 
    "Edad" => 66, 
    "Peso" => 79,
);   

$aPacientes[] = array(
    "DNI" => "37.565.258",
    "Nombre" => "Juan Irraola", 
    "Edad" => 28, 
    "Peso" => 79,
);   

$aPacientes[] = array(
    "DNI" => "20.554.001",
    "Nombre" => "Beatriz Campo", 
    "Edad" => 50, 
    "Peso" => 79,
);   

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-12 py-3 text-center">
            <h1>Listado de pacientes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover border">
                <tr>
                    <th>DNI</th>
                    <th>Nombre y apellido</th>
                    <th>Edad</th>
                    <th>Peso</th>
                </tr>                                                        
                <?php foreach ($aPacientes as $paciente) { ?>                       
                <tr>
                    <td><?php echo $paciente["DNI"];  ?></td>
                    <td><?php echo $paciente["Nombre"];  ?></td>       
                    <td><?php echo $paciente["Edad"];  ?></td>
                    <td><?php echo $paciente["Peso"];  ?></td>
                </tr>
                <?php } ?>
            </table>


            <div class="row">
        <div class="col-12 py-3 text-center">
            <h1>Listado de pacientes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover border">
                <tr>
                    <th>DNI</th>
                    <th>Nombre y apellido</th>
                    <th>Edad</th>
                    <th>Peso</th>
                </tr>
                <?php $contador=0;
                while($contador<count($aPacientes)) { ?>
                <tr>
                    <td><?php echo $aPacientes[$contador]["DNI"];  ?></td>
                    <td><?php echo $aPacientes[$contador]["Nombre"];  ?></td>
                    <td><?php echo $aPacientes[$contador]["Edad"];  ?></td>
                    <td><?php echo $aPacientes[$contador]["Peso"];  ?></td>
                </tr>
                <?php $contador++;} ?>
            </table>


            <div class="row">
        <div class="col-12 py-3 text-center">
            <h1>Listado de pacientes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover border">
                <tr>
                    <th>DNI</th>
                    <th>Nombre y apellido</th>
                    <th>Edad</th>
                    <th>Peso</th>
                </tr>
                <?php for($i=0;$i<count($aPacientes);$i++){ ?>
                <tr>
                    <td><?php echo $aPacientes[$i]["DNI"];  ?></td>
                    <td><?php echo $aPacientes[$i]["Nombre"];  ?></td>
                    <td><?php echo $aPacientes[$i]["Edad"];  ?></td>
                    <td><?php echo $aPacientes[$i]["Peso"];  ?></td>
                </tr>
                <?php } ?>
            </table>


        </div>
    </div>
    </div>
</body>
</html>