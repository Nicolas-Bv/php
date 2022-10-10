<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

//Definición
function print_f($variable)
{
    if (is_array($variable)) {
        $archivo = fopen('datos.txt', 'a+');

        //Si es un array, lo recorro y guardo el contenido en el archivo “datos.txt”
        fwrite($archivo, "\n\nDatos del array ==>\n");

        foreach ($variable as $item) {
            fwrite($archivo, $item . "\n");
        }
        fclose($archivo);

    } else {
        //Entonces es string, guardo el contenido en el archivo “datos.txt”
        $contenido = "Datos de la variable ==>\n" . $variable;
        file_put_contents("datos.txt", $contenido);
    }
    echo "Archivo generado.";
}

function print_f1($variable)
{
    if (is_array($variable)) {
        //Si es un array, lo recorro y guardo el contenido en el archivo “datos.txt”
        $contenido = "";
        $archivo1 = fopen("datos.txt", "w");
        foreach ($variable as $item) {
            $contenido .= $item . "\n";
        }
        fwrite($archivo1, $contenido);
        fclose($archivo1);
    } else {
        //Entonces es string, guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado.";
}

function print_f2($variable)
{
    if (is_array($variable)) {
        $contenido = "";
        foreach ($variable as $item) {
            $contenido .= $item . "\n";
        }
        file_put_contents("datos.txt", $contenido);

    } else {
        //Entonces es string, guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado.";
}

//uso
$aNotas=array(5,66,7,10);
$msj="Esto es un mensaje";
print_f($aNotas);
?>