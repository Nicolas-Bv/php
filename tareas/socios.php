<?php

use Persona as GlobalPersona;

ini_set("display_errors" ,1);
ini_set("display_startup_errors" ,1);
error_reporting(E_ALL);

abstract class Persona{ //clase abstracta, es un concepto
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __construct($dni,$nombre,$correo,$celular) //parent::
    {
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->correo=$correo;
        $this->celular=$celular;

    }

  public function imprimir(){}
   
}

class Cliente extends Persona{
    private $aTarjetas;
    private $bActivo;
    private $fechaAlta;
    private $fechaBaja;

    public function __construct()
    {
        $this->aTarjetas=array();
        $this->bActivo=true;
        $this->fechaAlta=date("d/m/Y H:i:s");
        
    }

    public function __get($propiedad)
    {
        $this->propiedad=$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        return $this->$propiedad=$valor;
    }

    
    public function agregarTarjeta($tarjeta)
    {
        $this->aTarjetas[]=$tarjeta;
    }

    public function darBaja($fecha)
    {
        $this->bActivo=false;
        $this->fechaBaja=$fecha;
    }


    public function imprimirLista()
    {
       
    }


}

    class Tarjeta{
        private $numero;
        private $fechaEmision;
        private $fechaVto;
        private $tipo;
        private $cvv;


        const VISA= "VISA";
        const MASTERCARD= "Mastercard";
        const AMEX = "AMEX";
        const NARANJA= "Tarjeta Naranja";
        const CABAL= "CABAL";

        public function __construct($numero,$fechaEmision,$fechaVto,$tipo,$cvv)
        {
            $this->numero=$numero;
            $this->fechaEmision=$fechaEmision;
            $this->fechaVto=$fechaVto;
            $this->tipo=$tipo;
            $this->cvv=$cvv;
        }

        public function imprimir(){
            echo "<table class='table table-hover broder shadow'>";
      
 
            echo "</table>";
        }
    }



    $cliente1 = new Cliente();
$cliente1->dni = "35123789";
$cliente1->nombre = "Ana Valle";
$cliente1->correo = "ana@correo.com";
$cliente1->celular = "1156781234";
$tarjeta1 = new Tarjeta("4001874440218625", "01/2022", "10/2023", Tarjeta::VISA,"458");
$tarjeta2 = new Tarjeta("4006226023729194", "05/2017", "11/2024", Tarjeta::MASTERCARD, "254");
$tarjeta3 = new Tarjeta("4568555021545587", "12/2011","03/2025", Tarjeta::CABAL, "548");
$cliente1->agregarTarjeta($tarjeta1);
$cliente1->agregarTarjeta($tarjeta2);
$cliente1->agregarTarjeta($tarjeta3);
$cliente1->imprimirLista();

$cliente2 = new Cliente();
$cliente2->dni = "48456876";
$cliente2->nombre = "Bernabe Paz";
$cliente2->correo = "bernabe@correo.com";
$cliente2->celular = "1145326787";
$cliente2->agregarTarjeta(new Tarjeta("4525558722000022", "01/2022", "02/2026", Tarjeta::CABAL,"578" ));
$cliente2->agregarTarjeta(new Tarjeta("4002566548778958", "02/2018", "06/2022", Tarjeta::NARANJA, "585"));
$cliente2->imprimirLista();
$cliente2->darBaja("04/09/2022");

?>