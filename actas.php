<?php
ini_set("display_errors", 1);
ini_set("display_starup_errors", 1);
error_reporting(E_ALL);


$aAlumnos= array();
$aAlumnos[]=array("Nombre"=>"Ana Valle","Notas"=>array(7,8));
$aAlumnos[]=array("Nombre"=>"Bernabe Paz","Notas"=>array(5,7));
$aAlumnos[]=array("Nombre"=>"Sebastián Aguirre","Notas"=>array(6,9));
$aAlumnos[]=array("Nombre"=>"Mónica Ledesma","Notas"=>array(8,9));

function promediar($aNumeros){
    $suma = 0;
    foreach ($aNumeros as $numero) {
        $suma = $suma + $numero;
    }
    return $suma / count($aNumeros);
};

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
<main class="container">
    <div class="row">
        <div class="col-12 p-3 text-center">
            <h1>Actas:</h1>
        </div>

            <div class="row">
                <div class="col-12">
                    <table class="table table-hover border">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Nota 1</th>
                                <th>Nota 2</th>
                                <th>Promedio</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($aAlumnos as $alumno){?>
                            <tr>
                                <td><?php echo $alumno["Nombre"]?></td>
                                <td><?php echo $alumno["Notas"][0]?></td>
                                <td><?php echo $alumno["Notas"][1]?></td>
                                <td><?php echo promediar($alumno["Notas"])?></td>
                            </tr>
                            <?php }; ?>
                        </tbody>
                    </table>

                    <?php "El promedio de la cursada es de: "?>

                </div>
            </div>
    </div>
</main>