<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 




function neto($neto, $porcentaje){
    $resultado= ($neto * $porcentaje ) / 100;
    return $neto - $resultado;
}


echo neto(80000,17)


?>