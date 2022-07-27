<?php 

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


$iva=21;
$conIva=0;
$sinIva=0;
$ivaCantidad=0;

if($_POST)
{

$iva=$_POST["listIva"];
$conIva=$_POST["txtConIva"]>0?$_POST["txtConIva"]:0;
$sinIva=$_POST["txtSinIva"]>0?$_POST["txtSinIva"]:0;


   if($sinIva>0){
         $conIva=$sinIva*($iva/100+1);
         $ivaCantidad=$conIva-$sinIva;
  

   }

   elseif($conIva>0){
        $sinIva=$conIva/($iva/100+1);
        $ivaCantidad=$conIva-$sinIva;
}

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IVA</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  
</head>
<body>

<main class="container">
    <div class="row">
        <div class="col-12 pb-3">
            <h1>Calculadora de IVA:</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-6 mb-3">
            <form action="" method="post" class="pb-4">
                <label for="" class="mb-3">IVA:<br>
                        <select name="listIva" id="ListIva" class="btn">
                            <option value="10.5">10.5</option>
                            <option value="21" selected>21</option>
                            <option value="19">19</option>
                            <option value="27">27</option>
                       </select>
               </label><br>

               <label for="">Con IVA:
                     <input type="number" name="txtConIva" id="txtConIva" class="form-control mt-2">
               </label><br>

               <label for="">Sin IVA:
                    <input type="number" name="txtSinIva" id="txtSinIva" class="form-control mt-2">
               </label><br>

               <button type="submit" class="btn btn-primary mt-2">CALCULAR</button>

                
            </form>
        </div>

        <div class="col-6">
            <table class="table table-hover border mt-2">
                <thead>
                    <tr>
                        <th>IVA:</th>
                        <td><?php echo $iva ?></td>
                    </tr>
                    <tr>
                        <th>Precio con IVA:</th>
                        <td><?php echo number_format($conIva,2,".",",") ?></td>
                    </tr>
                    <tr>
                        <th>Precio Sin IVA:</th>
                        <td><?php echo number_format($sinIva,2,".",",")  ?></td>
                    </tr>
                    <tr>
                        <th>IVA cantidad:</th>
                        <td><?php echo number_format($ivaCantidad,2,".",",") ?></td>
                    </tr>
                </thead>

            </table>
         </div>
    </div>
 
</main>
    
</body>
</html>