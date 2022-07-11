<?php
ini_set("display_errors", 1);
ini_set("display_starup_errors", 1);
error_reporting(E_ALL);

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

<?php

for($i=0;$i<101;$i++){
  echo $i . "<br>";}


for($i=0;$i<101;$i++){
    if($i%2==0)echo $i . "<br>";}


for($i=2;$i<101;$i+=2){
    echo $i . "<br>";
    if($i==60){break;}

}



?>



</body>

</html>