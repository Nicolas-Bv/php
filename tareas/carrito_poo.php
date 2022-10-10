<?php 

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

//defino el objeto

class Cliente{
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;
    
    public function __construct()
    {
        $this->descuento=0.0;
    }                                           //tengo que hacer todo por separado

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor){
        $this->$propiedad=$valor;                //asigno clave valor
    }
   

    public function imprimir(){                 //lo que necesito imprimir
        "DNI: " .$this->dni. "<br>";
        "Nombre: " .$this->nombre. "<br>";
        "Correo: " .$this->correo. "<br>";
        "Teléfono: " .$this->telefono. "<br>";
        "Descuento: " .$this->descuento. "<br><br>";

    }


}



class Producto {
 
    private $cod;
    private $nombre;
    private $descripcion;
    private $precio;
    private $iva;


    public function __construct()
    {
        $this->descuento=0.0;
        $this->iva=0.0;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad=$valor;
    }


    public function imprimir(){

       "Código: " .$this->cod. "<br>";
       "Nombre: " .$this->nombre. "<br>";
       "Descripcion: " .$this->descripcion. "<br>";
       "Precio: " .$this->precio. "<br>";
       "IVA: " .$this->iva. "<br>";      

    }



}


    class Carrito{

        private $cliente;
        private $aProducto;
        private $subtotal;
        private $total;

        public function __construct()
        {
            $this->subtotal=0.0;
            $this->total=0.0;
        }

        public function __get($propiedad){
            return $this->$propiedad;
        }

        public function __set($propiedad, $valor)
        {
            $this->$propiedad=$valor;
        }

        public function cargarProductos($producto){

            $this->aProducto[]=$producto;

        }


            public function imprimirTicket() {
                echo "<table class='table table-hover border' style='width:400px'>";
                echo "<tr><th colspan='2' class='text-center'>ECO MARKET</th></tr>
                      <tr>
                        <th>Fecha</th>
                        <td>" . date("d/m/Y H:i:s") . "</td>
                      </tr>
                      <tr>
                        <th>DNI</th>
                        <td>" . $this->cliente->dni . "</td>
                      </tr>
                      <tr>
                        <th>Nombre</th>
                        <td>" . $this->cliente->nombre . "</td>
                      </tr>
                      <tr>
                        <th colspan='2'>Productos:</th>
                      </tr>";
                      foreach ($this->aProducto as $producto) {
                        echo "<tr>
                                    <td>" . $producto->nombre . "</td>
                                    <td>$ " . number_format($producto->precio, 2, ",", ".") . "</td>
                                </tr>";
                        $this->subtotal += $producto->precio;
                        $this->total += $producto->precio * (($producto->iva / 100)+1);
                      }
                     
                echo "<tr>
                        <th>Subtotal s/IVA:</th>
                        <td>$ " . number_format($this->subtotal, 2, ",", ".") . "</td>
                      </tr>
                    <tr>
                        <th>TOTAL:</th>
                        <td>$ " . number_format($this->total, 2, ",", ".") . "</td>
                      </tr>
                </table>";
            }


    }






$cliente1=new Cliente();
$cliente1->dni="34657754";
$cliente1->nombre="Bernabe";
$cliente1->correo="bernabe@gmail.com";
$cliente1->telefono="+541154899886";
$cliente1->descuento=0.5;
$cliente1->imprimir();

$producto1=new Producto();
$producto1->cod="AB8667";
$producto1->nombre="NOTEBOOK 15º\" HP";
$producto1->descripcion="Esta es una computadora HP";
$producto1->precio=30800;
$producto1->IVA=21;
$producto1->imprimir();

$producto2=new Producto();
$producto2->cod="QWR650";
$producto2->nombre="Heladera Whirhool";
$producto1->descripcion="Esta es una heladera no-froze";
$producto2->precio=76000;
$producto2->IVA=10.5;
$producto2->imprimir();

$carrito=new Carrito();
$carrito->cliente=$cliente1;
$carrito->cargarProductos($producto1);
$carrito->cargarProductos($producto2);
$carrito->imprimirTicket();





?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito POO</title>
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 mt-2">
            <div>
                <?php echo $carrito->imprimirTicket();?>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>