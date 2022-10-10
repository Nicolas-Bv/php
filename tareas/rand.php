<?php

ini_set("display_errors", 1);
ini_set("display_starup_errors", 1);
error_reporting(E_ALL);

$valor=rand(1,5);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rand</title>
</head>
<body>
    <?php
if ($valor%2==1){
    echo "El número $valor es impar";
} else { echo "El numero $valor es par";}





    ?>
</body>
</html>