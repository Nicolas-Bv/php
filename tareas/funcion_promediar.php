<?php
ini_set("display_errors", 1);
ini_set("display_starup_errors", 1);
error_reporting(E_ALL);

$aNotas=array(8,4,5,3,9,1);


function promediar($aNumeros){
    $suma=0;
  foreach($aNumeros as $numero){
   ($suma+=$numero);
  }
  return $suma/count($aNumeros);
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

<?php

echo "El promedio es " . promediar($aNotas) . "<br>"

?>

</body>

</html>