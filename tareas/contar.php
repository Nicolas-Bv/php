<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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

$aNotas = array(9, 8, 9.50, 4, 7, 8);


function contar($aArray){
    $contador=0;
foreach($aArray as $item){
    $contador++;
} return $contador;
}

echo "cantidad de productos " . contar($aProductos) . "<br>"; 
echo "cantidad de pacientes " . contar($aPacientes) . "<br>";  
echo "cantidad de notas " . contar($aNotas);

?>